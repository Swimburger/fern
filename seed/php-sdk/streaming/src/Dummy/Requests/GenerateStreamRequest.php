<?php

namespace Seed\Dummy\Requests;

use Seed\Core\JsonProperty;

class GenerateStreamRequest
{
    #[JsonProperty("stream")]
    /**
     * @var bool $stream
     */
    public bool $stream;

    #[JsonProperty("num_events")]
    /**
     * @var int $numEvents
     */
    public int $numEvents;

}
