<?php

namespace Seed\User\Requests;

use Seed\Core\JsonProperty;

class CreateUserRequest
{
    #[JsonProperty("_type")]
    /**
     * @var string $type
     */
    public string $type;

    #[JsonProperty("_version")]
    /**
     * @var string $version
     */
    public string $version;

    #[JsonProperty("name")]
    /**
     * @var string $name
     */
    public string $name;

}
