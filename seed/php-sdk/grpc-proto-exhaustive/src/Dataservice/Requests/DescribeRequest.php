<?php

namespace Seed\Dataservice\Requests;

use Seed\Core\JsonProperty;

class DescribeRequest
{
    #[JsonProperty("filter")]
    /**
     * @var mixed $filter
     */
    public mixed $filter;

}
