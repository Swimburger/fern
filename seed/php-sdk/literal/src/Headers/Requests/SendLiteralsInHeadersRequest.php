<?php

namespace Seed\Headers\Requests;

use Seed\Core\JsonProperty;

class SendLiteralsInHeadersRequest
{
    /**
     * @var string $endpointVersion
     */
    public string $endpointVersion;

    /**
     * @var bool $async
     */
    public bool $async;

    #[JsonProperty("query")]
    /**
     * @var string $query
     */
    public string $query;

}
