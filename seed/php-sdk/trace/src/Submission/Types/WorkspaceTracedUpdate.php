<?php

namespace Seed\Submission\Types;

use Seed\Core\SerializableType;
use Seed\Core\JsonProperty;

class WorkspaceTracedUpdate extends SerializableType
{
    /**
     * @var int $traceResponsesSize
     */
    #[JsonProperty("traceResponsesSize")]
    public int $traceResponsesSize;

    /**
     * @param int $traceResponsesSize
     */
    public function __construct(
        int $traceResponsesSize,
    ) {
        $this->traceResponsesSize = $traceResponsesSize;
    }
}
