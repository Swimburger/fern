# This file was auto-generated by Fern from our API Definition.

from __future__ import annotations
from ......core.pydantic_utilities import UniversalBaseModel
from .....commons.types.list_type import ListType
from .....commons.types.map_type import MapType
from .test_case_template_id import TestCaseTemplateId
import pydantic
from .test_case_implementation import TestCaseImplementation
from ......core.pydantic_utilities import IS_PYDANTIC_V2
import typing
from ......core.pydantic_utilities import update_forward_refs


class TestCaseTemplate(UniversalBaseModel):
    template_id: TestCaseTemplateId = pydantic.Field(alias="templateId")
    name: str
    implementation: TestCaseImplementation

    if IS_PYDANTIC_V2:
        model_config: typing.ClassVar[pydantic.ConfigDict] = pydantic.ConfigDict(
            extra="forbid"
        )  # type: ignore # Pydantic v2
    else:

        class Config:
            extra = pydantic.Extra.forbid


update_forward_refs(ListType, TestCaseTemplate=TestCaseTemplate)
update_forward_refs(MapType, TestCaseTemplate=TestCaseTemplate)
