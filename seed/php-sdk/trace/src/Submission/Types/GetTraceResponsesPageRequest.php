<?php

namespace Seed\Submission\Types;

use Seed\Core\SerializableType;
use Seed\Core\JsonProperty;

class GetTraceResponsesPageRequest extends SerializableType
{
    /**
     * @var ?int $offset
     */
    #[JsonProperty("offset")]
    public ?int $offset;

    /**
     * @param ?int $offset
     */
    public function __construct(
        ?int $offset = null,
    ) {
        $this->offset = $offset;
    }
}
