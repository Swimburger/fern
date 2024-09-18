<?php

namespace Seed\Problem\Requests;

use Seed\Core\JsonProperty;
use Seed\Core\ArrayType;
use Seed\Problem\Types\VariableTypeAndName;

class GetDefaultStarterFilesRequest
{
    #[JsonProperty("inputParams"), ArrayType([VariableTypeAndName::class])]
    /**
     * @var array<VariableTypeAndName> $inputParams
     */
    public array $inputParams;

    #[JsonProperty("outputType")]
    /**
     * @var mixed $outputType
     */
    public mixed $outputType;

    #[JsonProperty("methodName")]
    /**
     * @var string $methodName The name of the `method` that the student has to complete.
    The method name cannot include the following characters:
      - Greater Than `>`
      - Less Than `<``
      - Equals `=`
      - Period `.`

     */
    public string $methodName;

}
