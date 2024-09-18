<?php

namespace Seed\Admin\Requests;

use Seed\Core\JsonProperty;
use Seed\Submission\Types\WorkspaceRunDetails;
use Seed\Core\ArrayType;
use Seed\Submission\Types\TraceResponse;

class StoreTracedWorkspaceRequest
{
    #[JsonProperty("workspaceRunDetails")]
    /**
     * @var WorkspaceRunDetails $workspaceRunDetails
     */
    public WorkspaceRunDetails $workspaceRunDetails;

    #[JsonProperty("traceResponses"), ArrayType([TraceResponse::class])]
    /**
     * @var array<TraceResponse> $traceResponses
     */
    public array $traceResponses;

}
