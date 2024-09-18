<?php

namespace Seed\Dataservice\Requests;

use Seed\Core\JsonProperty;
use Seed\Core\ArrayType;
use Seed\Types\QueryColumn;
use Seed\Types\IndexedData;

class QueryRequest
{
    #[JsonProperty("namespace")]
    /**
     * @var ?string $namespace
     */
    public ?string $namespace;

    #[JsonProperty("topK")]
    /**
     * @var int $topK
     */
    public int $topK;

    #[JsonProperty("filter")]
    /**
     * @var mixed $filter
     */
    public mixed $filter;

    #[JsonProperty("includeValues")]
    /**
     * @var ?bool $includeValues
     */
    public ?bool $includeValues;

    #[JsonProperty("includeMetadata")]
    /**
     * @var ?bool $includeMetadata
     */
    public ?bool $includeMetadata;

    #[JsonProperty("queries"), ArrayType([QueryColumn::class])]
    /**
     * @var ?array<QueryColumn> $queries
     */
    public ?array $queries;

    #[JsonProperty("column"), ArrayType(["float"])]
    /**
     * @var ?array<float> $column
     */
    public ?array $column;

    #[JsonProperty("id")]
    /**
     * @var ?string $id
     */
    public ?string $id;

    #[JsonProperty("indexedData")]
    /**
     * @var ?IndexedData $indexedData
     */
    public ?IndexedData $indexedData;

}
