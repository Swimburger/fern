<?php

namespace Seed\Foo\Requests;

use Seed\Core\JsonProperty;

class FindRequest
{
    /**
     * @var ?string $optionalString
     */
    public ?string $optionalString;

    #[JsonProperty("publicProperty")]
    /**
     * @var ?string $publicProperty
     */
    public ?string $publicProperty;

    #[JsonProperty("privateProperty")]
    /**
     * @var ?int $privateProperty
     */
    public ?int $privateProperty;

}
