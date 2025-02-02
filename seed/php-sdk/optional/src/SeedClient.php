<?php

namespace Seed;

use Seed\Optional\OptionalClient;
use GuzzleHttp\ClientInterface;
use Seed\Core\RawClient;
use GuzzleHttp\Client;

class SeedClient
{
    /**
     * @var OptionalClient $optional
     */
    public OptionalClient $optional;

    /**
     * @var ?array{baseUrl?: string, client?: ClientInterface} $options
     */
    private ?array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param ?array{baseUrl?: string, client?: ClientInterface} $options
     */
    public function __construct(
        ?array $options = null,
    ) {
        $defaultHeaders = ["X-Fern-Language" => "PHP","X-Fern-SDK-Name" => "Seed","X-Fern-SDK-Version" => "0.0.1"];
        $this->options = $options ?? [];
        $this->client = new RawClient(client: $this->options['client'] ?? new Client(), headers: $defaultHeaders);
        $this->optional = new OptionalClient($this->client);
    }
}
