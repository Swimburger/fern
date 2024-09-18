<?php

namespace Seed\S3\Requests;

use Seed\Core\JsonProperty;

class GetPresignedUrlRequest
{
    #[JsonProperty("s3Key")]
    /**
     * @var string $s3Key
     */
    public string $s3Key;

}
