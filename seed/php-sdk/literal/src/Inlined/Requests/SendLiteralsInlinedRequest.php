<?php

namespace Seed\Inlined\Requests;

use Seed\Core\JsonProperty;
use Seed\Inlined\Types\ATopLevelLiteral;

class SendLiteralsInlinedRequest
{
    #[JsonProperty("prompt")]
    /**
     * @var string $prompt
     */
    public string $prompt;

    #[JsonProperty("context")]
    /**
     * @var ?string $context
     */
    public ?string $context;

    #[JsonProperty("query")]
    /**
     * @var string $query
     */
    public string $query;

    #[JsonProperty("temperature")]
    /**
     * @var ?float $temperature
     */
    public ?float $temperature;

    #[JsonProperty("stream")]
    /**
     * @var bool $stream
     */
    public bool $stream;

    #[JsonProperty("aliasedContext")]
    /**
     * @var string $aliasedContext
     */
    public string $aliasedContext;

    #[JsonProperty("maybeContext")]
    /**
     * @var ?string $maybeContext
     */
    public ?string $maybeContext;

    #[JsonProperty("objectWithLiteral")]
    /**
     * @var ATopLevelLiteral $objectWithLiteral
     */
    public ATopLevelLiteral $objectWithLiteral;

}
