<?php

namespace Seed\Requests;

use Seed\Core\JsonProperty;

class InlinedChildRequest
{
    #[JsonProperty("child")]
    /**
     * @var string $child
     */
    public string $child;

    #[JsonProperty("parent")]
    /**
     * @var string $parent
     */
    public string $parent;

}
