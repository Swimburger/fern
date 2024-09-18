<?php

namespace Seed\InlinedRequest\Requests;

use Seed\Core\JsonProperty;
use Seed\Types\Operand;

class SendEnumInlinedRequest
{
    #[JsonProperty("operand")]
    /**
     * @var Operand $operand
     */
    public Operand $operand;

    #[JsonProperty("maybeOperand")]
    /**
     * @var ?Operand $maybeOperand
     */
    public ?Operand $maybeOperand;

    #[JsonProperty("operandOrColor")]
    /**
     * @var mixed $operandOrColor
     */
    public mixed $operandOrColor;

    #[JsonProperty("maybeOperandOrColor")]
    /**
     * @var mixed $maybeOperandOrColor
     */
    public mixed $maybeOperandOrColor;

}
