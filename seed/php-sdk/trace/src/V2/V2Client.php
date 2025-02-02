<?php

namespace Seed\V2;

use Seed\V2\Problem\ProblemClient;
use Seed\V2\V3\V3Client;
use Seed\Core\RawClient;
use Psr\Http\Client\ClientExceptionInterface;
use Exception;

class V2Client
{
    /**
     * @var ProblemClient $problem
     */
    public ProblemClient $problem;

    /**
     * @var V3Client $v3
     */
    public V3Client $v3;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     */
    public function __construct(
        RawClient $client,
    ) {
        $this->client = $client;
        $this->problem = new ProblemClient($this->client);
        $this->v3 = new V3Client($this->client);
    }

    /**
     * @param ?array{baseUrl?: string} $options
     * @returns mixed
     */
    public function test(?array $options = null): mixed
    {
        try {
            $response = $this->client->sendRequest();
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new Exception($e->getMessage());
        }
        throw new Exception("Error with status code " . $statusCode);
    }

}
