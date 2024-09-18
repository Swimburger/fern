<?php

namespace Seed\User\Requests;

use Seed\Core\JsonProperty;

class CreateUserRequest
{
    #[JsonProperty("name")]
    /**
     * @var string $name The name of the user to create.
    This name is unique to each user.

     */
    public string $name;

    #[JsonProperty("age")]
    /**
     * @var ?int $age The age of the user.
    This propery is not required.

     */
    public ?int $age;

}
