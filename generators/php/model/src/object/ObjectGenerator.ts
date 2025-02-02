import { join, RelativeFilePath } from "@fern-api/fs-utils";
import { PhpFile } from "@fern-api/php-codegen";
import { FileGenerator } from "@fern-api/php-codegen";
import { php } from "@fern-api/php-codegen";
import {
    ExampleObjectType,
    NameAndWireValue,
    ObjectProperty,
    ObjectTypeDeclaration,
    Type,
    TypeDeclaration
} from "@fern-fern/ir-sdk/api";
import { CsharpProtobufFileOptions } from "@fern-fern/ir-sdk/serialization";
import { assertNever } from "../../../codegen/node_modules/@fern-api/core-utils/src";
import { ModelCustomConfigSchema } from "../ModelCustomConfig";
import { ModelGeneratorContext } from "../ModelGeneratorContext";

export class ObjectGenerator extends FileGenerator<PhpFile, ModelCustomConfigSchema, ModelGeneratorContext> {
    private readonly typeDeclaration: TypeDeclaration;
    private readonly classReference: php.ClassReference;
    constructor(
        context: ModelGeneratorContext,
        typeDeclaration: TypeDeclaration,
        private readonly objectDeclaration: ObjectTypeDeclaration
    ) {
        super(context);
        this.typeDeclaration = typeDeclaration;
        this.classReference = this.context.phpTypeMapper.convertToClassReference(this.typeDeclaration.name);
    }

    public doGenerate(): PhpFile {
        const clazz = php.class_({
            ...this.classReference,
            docs: this.typeDeclaration.docs,
            parentClassReference: this.context.getSerializableTypeClassReference()
        });
        // todo: handle extended properties
        const properties = this.objectDeclaration.properties.map((property) => ({
            property,
            type: this.context.phpTypeMapper.convert({ reference: property.valueType }),
            name: this.context.getPropertyName(property.name.name),
            docs: property.docs
        }));

        const requiredProperties = properties.filter(({ type }) => type.internalType.type !== "optional");
        const optionalProperties = properties.filter(({ type }) => type.internalType.type === "optional");

        const orderedProperties = [...requiredProperties, ...optionalProperties];

        orderedProperties.forEach((property) => {
            clazz.addField(
                php.field({
                    ...property,
                    access: "public",
                    attributes: this.getAllAttributesForProperty(property)
                })
            );
        });

        const parameters = orderedProperties.map((property) => php.parameter(property));

        clazz.addConstructor({
            parameters,
            body: php.codeblock((writer) => {
                orderedProperties.forEach(({ name }) => {
                    writer.writeTextStatement(`$this->${name} = $${name}`);
                });
            })
        });

        return new PhpFile({
            clazz,
            rootNamespace: this.context.getRootNamespace(),
            directory: this.context.getLocationForTypeId(this.typeDeclaration.name.typeId).directory,
            customConfig: this.context.customConfig
        });
    }

    protected getFilepath(): RelativeFilePath {
        return this.context.getLocationForTypeId(this.typeDeclaration.name.typeId).directory;
    }

    private getAllAttributesForProperty({
        property,
        type
    }: {
        property: ObjectProperty;
        type: php.Type;
    }): php.Attribute[] {
        const attributes: php.Attribute[] = [];
        attributes.push(
            php.attribute({
                reference: this.context.getJsonPropertyAttributeClassReference(),
                arguments: [`"${property.name.wireValue}"`]
            })
        );
        const underlyingInternalType = type.underlyingType().internalType;
        if (underlyingInternalType.type === "date" || underlyingInternalType.type === "dateTime") {
            attributes.push(
                php.attribute({
                    reference: this.context.getDateTypeAttributeClassReference(),
                    arguments: [`DateType::TYPE_${underlyingInternalType.type.toUpperCase()}`]
                })
            );
        }
        if (underlyingInternalType.type === "array" || underlyingInternalType.type === "map") {
            attributes.push(
                php.attribute({
                    reference: this.context.getArrayTypeClassReference(),
                    arguments: [this.getArrayTypeAttributeArgument(type.underlyingType())]
                })
            );
        }
        return attributes;
    }

    private getArrayTypeAttributeArgument(type: php.Type): php.AstNode {
        switch (type.internalType.type) {
            case "int":
                return php.codeblock('"integer"');
            case "string":
                return php.codeblock('"string"');
            case "bool":
                return php.codeblock('"bool"');
            case "float":
                return php.codeblock('"float"');
            case "date":
                return php.codeblock('"date"');
            case "dateTime":
                return php.codeblock('"datetime"');
            case "mixed":
                return php.codeblock('"mixed"');
            case "object":
                // this is likely not handled by our serde, but we also never use it
                return php.codeblock('"object"');
            case "array":
                return php.array({
                    entries: [this.getArrayTypeAttributeArgument(type.internalType.value)]
                });
            case "map": {
                return php.map({
                    entries: [
                        {
                            key: this.getArrayTypeAttributeArgument(type.internalType.keyType),
                            value: this.getArrayTypeAttributeArgument(type.internalType.valueType)
                        }
                    ]
                });
            }
            case "typeDict": {
                return php.map({
                    entries: [
                        {
                            key: php.codeblock('"string"'),
                            value: php.codeblock('"mixed"')
                        }
                    ]
                });
            }
            case "optional":
                return php.instantiateClass({
                    classReference: this.context.getUnionClassReference(),
                    arguments_: [this.getArrayTypeAttributeArgument(type.internalType.value), php.codeblock('"null"')]
                });
            case "reference": {
                const reference = type.internalType.value;
                return php.codeblock((writer) => {
                    writer.writeNode(reference);
                    writer.write("::class");
                });
            }
            default:
                assertNever(type.internalType);
        }
    }
}
