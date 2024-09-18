<?php

namespace Seed\Dataservice\Requests;

use Seed\Core\JsonProperty;
use Seed\Core\ArrayType;
use Seed\Types\Column;

class UploadRequest
{
    #[JsonProperty("columns"), ArrayType([Column::class])]
    /**
     * @var array<Column> $columns
     */
    public array $columns;

    #[JsonProperty("namespace")]
    /**
     * @var ?string $namespace
     */
    public ?string $namespace;

}
