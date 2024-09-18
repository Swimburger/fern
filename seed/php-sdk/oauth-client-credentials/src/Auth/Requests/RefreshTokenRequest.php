<?php

namespace Seed\Auth\Requests;

use Seed\Core\JsonProperty;

class RefreshTokenRequest
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

    #[JsonProperty("refresh_token")]
    /**
     * @var string $refreshToken
     */
    public string $refreshToken;

    #[JsonProperty("audience")]
    /**
     * @var string $audience
     */
    public string $audience;

    #[JsonProperty("grant_type")]
    /**
     * @var string $grantType
     */
    public string $grantType;

    #[JsonProperty("scope")]
    /**
     * @var ?string $scope
     */
    public ?string $scope;

}
