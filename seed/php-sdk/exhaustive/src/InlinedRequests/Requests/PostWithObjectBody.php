<?php

namespace Seed\InlinedRequests\Requests;

use Seed\Core\JsonProperty;
use Seed\Types\Object\Types\ObjectWithOptionalField;

class PostWithObjectBody
{
    #[JsonProperty("string")]
    /**
     * @var string $string
     */
    public string $string;

    #[JsonProperty("integer")]
    /**
     * @var int $integer
     */
    public int $integer;

    #[JsonProperty("NestedObject")]
    /**
     * @var ObjectWithOptionalField $nestedObject
     */
    public ObjectWithOptionalField $nestedObject;

}
