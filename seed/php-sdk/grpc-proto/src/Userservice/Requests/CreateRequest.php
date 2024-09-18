<?php

namespace Seed\Userservice\Requests;

use Seed\Core\JsonProperty;

class CreateRequest
{
    #[JsonProperty("username")]
    /**
     * @var ?string $username
     */
    public ?string $username;

    #[JsonProperty("email")]
    /**
     * @var ?string $email
     */
    public ?string $email;

    #[JsonProperty("age")]
    /**
     * @var ?int $age
     */
    public ?int $age;

    #[JsonProperty("weight")]
    /**
     * @var ?float $weight
     */
    public ?float $weight;

    #[JsonProperty("metadata")]
    /**
     * @var mixed $metadata
     */
    public mixed $metadata;

}
