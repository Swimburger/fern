<?php

namespace Seed\Users\Requests;

use Seed\Core\JsonProperty;
use Seed\Users\Types\WithPage;

class ListUsersBodyOffsetPaginationRequest
{
    #[JsonProperty("pagination")]
    /**
     * @var ?WithPage $pagination The object that contains the offset used for pagination
    in order to fetch the next page of results.

     */
    public ?WithPage $pagination;

}
