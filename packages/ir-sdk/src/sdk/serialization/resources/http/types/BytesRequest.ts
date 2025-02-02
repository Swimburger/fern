/**
 * This file was auto-generated by Fern from our API Definition.
 */

import * as serializers from "../../../index";
import * as FernIr from "../../../../api/index";
import * as core from "../../../../core";

export const BytesRequest: core.serialization.ObjectSchema<serializers.BytesRequest.Raw, FernIr.BytesRequest> =
    core.serialization.objectWithoutOptionalProperties({
        isOptional: core.serialization.boolean(),
        contentType: core.serialization.string().optional(),
    });

export declare namespace BytesRequest {
    interface Raw {
        isOptional: boolean;
        contentType?: string | null;
    }
}
