<?php

namespace Seed\Types\Object;

use Seed\Core\SerializableType;
use Seed\Core\JsonProperty;

class ObjectWithRequiredField extends SerializableType
{
    /**
     * @var string $string
     */
    #[JsonProperty("string")]
    public string $string;

    /**
     * @param string $string
     */
    public function __construct(
        string $string,
    ) {
        $this->string = $string;
    }
}
