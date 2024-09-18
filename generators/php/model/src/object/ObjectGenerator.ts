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
        const requiredProperties = this.objectDeclaration.properties.filter(
            (property) => !this.context.isOptional(property.valueType)
        );
        const optionalProperties = this.objectDeclaration.properties.filter((property) =>
            this.context.isOptional(property.valueType)
        );
        const orderedProperties = [...requiredProperties, ...optionalProperties];
        orderedProperties.forEach((property) => {
            const type = this.context.phpTypeMapper.convert({ reference: property.valueType });
            clazz.addField(
                php.field({
                    name: property.name.name.camelCase.unsafeName,
                    type,
                    access: "public",
                    docs: property.docs,
                    attributes: this.context.phpAttributeMapper.convert({ property, type })
                })
            );
        });
        const parameters = orderedProperties.map((property) =>
            php.parameter({
                name: property.name.name.camelCase.unsafeName,
                type: this.context.phpTypeMapper.convert({ reference: property.valueType }),
                docs: property.docs
            })
        );
        clazz.addConstructor({
            parameters,
            body: php.codeblock((writer) => {
                orderedProperties.forEach((property) => {
                    const propertyName = property.name.name.camelCase.unsafeName;
                    writer.writeTextStatement(`$this->${propertyName} = $${propertyName}`);
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
}
