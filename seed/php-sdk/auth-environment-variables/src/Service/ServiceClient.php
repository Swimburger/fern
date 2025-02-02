<?php

namespace Seed\Service;

use Seed\Core\RawClient;
use JsonException;
use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Seed\Service\Requests\HeaderAuthRequest;

class ServiceClient
{
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
    }

    /**
    * GET request with custom api key
     * @param ?array{baseUrl?: string} $options
     * @returns mixed
     */
    public function getWithApiKey(?array $options = null): mixed
    {
        try {
            $response = $this->client->sendRequest();
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
            }
        } catch (JsonException $e) {
            throw new Exception("Failed to deserialize response", 0, $e);
        } catch (ClientExceptionInterface $e) {
            throw new Exception($e->getMessage());
        }
        throw new Exception("Error with status code " . $statusCode);
    }

    /**
    * GET request with custom api key
     * @param HeaderAuthRequest request
     * @param ?array{baseUrl?: string} $options
     * @returns mixed
     */
    public function getWithHeader(HeaderAuthRequest $request, ?array $options = null): mixed
    {
        $headers = [];
        $headers['X-Endpoint-Header'] = request->xEndpointHeader;
        try {
            $response = $this->client->sendRequest();
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
            }
        } catch (JsonException $e) {
            throw new Exception("Failed to deserialize response", 0, $e);
        } catch (ClientExceptionInterface $e) {
            throw new Exception($e->getMessage());
        }
        throw new Exception("Error with status code " . $statusCode);
    }

}
