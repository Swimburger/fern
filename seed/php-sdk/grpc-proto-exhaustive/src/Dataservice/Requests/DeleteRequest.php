<?php

namespace Seed\Dataservice\Requests;

use Seed\Core\JsonProperty;
use Seed\Core\ArrayType;

class DeleteRequest
{
    #[JsonProperty("ids"), ArrayType(["string"])]
    /**
     * @var ?array<string> $ids
     */
    public ?array $ids;

    #[JsonProperty("deleteAll")]
    /**
     * @var ?bool $deleteAll
     */
    public ?bool $deleteAll;

    #[JsonProperty("namespace")]
    /**
     * @var ?string $namespace
     */
    public ?string $namespace;

    #[JsonProperty("filter")]
    /**
     * @var mixed $filter
     */
    public mixed $filter;

}
