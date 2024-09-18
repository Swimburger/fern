<?php

namespace Seed\Dataservice\Requests;

use Seed\Core\JsonProperty;
use Seed\Core\ArrayType;
use Seed\Types\IndexedData;

class UpdateRequest
{
    #[JsonProperty("id")]
    /**
     * @var string $id
     */
    public string $id;

    #[JsonProperty("values"), ArrayType(["float"])]
    /**
     * @var ?array<float> $values
     */
    public ?array $values;

    #[JsonProperty("setMetadata")]
    /**
     * @var mixed $setMetadata
     */
    public mixed $setMetadata;

    #[JsonProperty("namespace")]
    /**
     * @var ?string $namespace
     */
    public ?string $namespace;

    #[JsonProperty("indexedData")]
    /**
     * @var ?IndexedData $indexedData
     */
    public ?IndexedData $indexedData;

}
