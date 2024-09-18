<?php

namespace Seed\Requests;

use Seed\Core\JsonProperty;
use Seed\Types\Shape;

class CreateRequest
{
    #[JsonProperty("decimal")]
    /**
     * @var float $decimal
     */
    public float $decimal;

    #[JsonProperty("even")]
    /**
     * @var int $even
     */
    public int $even;

    #[JsonProperty("name")]
    /**
     * @var string $name
     */
    public string $name;

    #[JsonProperty("shape")]
    /**
     * @var Shape $shape
     */
    public Shape $shape;

}
