<?php

namespace Seed\Ec2\Requests;

use Seed\Core\JsonProperty;

class BootInstanceRequest
{
    #[JsonProperty("size")]
    /**
     * @var string $size
     */
    public string $size;

}
