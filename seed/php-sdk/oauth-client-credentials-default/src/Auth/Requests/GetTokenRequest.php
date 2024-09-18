<?php

namespace Seed\Auth\Requests;

use Seed\Core\JsonProperty;

class GetTokenRequest
{
    #[JsonProperty("client_id")]
    /**
     * @var string $clientId
     */
    public string $clientId;

    #[JsonProperty("client_secret")]
    /**
     * @var string $clientSecret
     */
    public string $clientSecret;

    #[JsonProperty("grant_type")]
    /**
     * @var string $grantType
     */
    public string $grantType;

}
