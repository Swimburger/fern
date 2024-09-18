<?php

namespace Seed\Requests;

use Seed\Core\JsonProperty;

class Inlined
{
    #[JsonProperty("unique")]
    /**
     * @var string $unique
     */
    public string $unique;

    #[JsonProperty("name")]
    /**
     * @var string $name
     */
    public string $name;

    #[JsonProperty("docs")]
    /**
     * @var string $docs
     */
    public string $docs;

}
