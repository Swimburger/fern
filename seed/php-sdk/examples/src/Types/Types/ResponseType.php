<?php

namespace Seed\Types\Types;

use Seed\Core\SerializableType;
use Seed\Core\JsonProperty;

class ResponseType extends SerializableType
{
    /**
     * @var mixed $type
     */
    #[JsonProperty("type")]
    public mixed $type;

    /**
     * @param mixed $type
     */
    public function __construct(
        mixed $type,
    ) {
        $this->type = $type;
    }
}
