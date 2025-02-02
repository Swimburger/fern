<?php

namespace Seed\User;

use Seed\Core\RawClient;
use Seed\User\Requests\GetUsersRequest;
use Seed\Core\Constant;
use JsonException;
use Exception;
use Psr\Http\Client\ClientExceptionInterface;

class UserClient
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
     * @param GetUsersRequest request
     * @param ?array{baseUrl?: string} $options
     * @returns mixed
     */
    public function getUsername(GetUsersRequest $request, ?array $options = null): mixed
    {
        $query = [];
        $query['limit'] = request->limit;
        $query['id'] = request->id;
        $query['date'] = request->date->format(Constant::DateFormat);
        $query['deadline'] = request->deadline->format(Constant::DateTimeFormat);
        $query['bytes'] = request->bytes;
        $query['user'] = request->user;
        $query['userList'] = request->userList;
        $query['keyValue'] = request->keyValue;
        $query['nestedUser'] = request->nestedUser;
        $query['excludeUser'] = request->excludeUser;
        $query['filter'] = request->filter;
        if (request->optionalDeadline != null) {
            $query['optionalDeadline'] = request->optionalDeadline;
        }
        if (request->optionalString != null) {
            $query['optionalString'] = request->optionalString;
        }
        if (request->optionalUser != null) {
            $query['optionalUser'] = request->optionalUser;
        }
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
