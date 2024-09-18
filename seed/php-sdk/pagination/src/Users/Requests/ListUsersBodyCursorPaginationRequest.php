<?php

namespace Seed\Users\Requests;

use Seed\Core\JsonProperty;
use Seed\Users\Types\WithCursor;

class ListUsersBodyCursorPaginationRequest
{
    #[JsonProperty("pagination")]
    /**
     * @var ?WithCursor $pagination The object that contains the cursor used for pagination
    in order to fetch the next page of results.

     */
    public ?WithCursor $pagination;

}
