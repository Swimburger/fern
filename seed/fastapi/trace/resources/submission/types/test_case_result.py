# This file was auto-generated by Fern from our API Definition.

from __future__ import annotations
from ....core.pydantic_utilities import UniversalBaseModel
from ...commons.types.key_value_pair import KeyValuePair
from ...commons.types.map_value import MapValue
from ...commons.types.variable_value import VariableValue
import pydantic
from .actual_result import ActualResult
from ....core.pydantic_utilities import IS_PYDANTIC_V2
import typing
from ....core.pydantic_utilities import update_forward_refs


class TestCaseResult(UniversalBaseModel):
    expected_result: VariableValue = pydantic.Field(alias="expectedResult")
    actual_result: ActualResult = pydantic.Field(alias="actualResult")
    passed: bool

    if IS_PYDANTIC_V2:
        model_config: typing.ClassVar[pydantic.ConfigDict] = pydantic.ConfigDict(
            extra="forbid"
        )  # type: ignore # Pydantic v2
    else:

        class Config:
            extra = pydantic.Extra.forbid


update_forward_refs(KeyValuePair, TestCaseResult=TestCaseResult)
update_forward_refs(MapValue, TestCaseResult=TestCaseResult)
