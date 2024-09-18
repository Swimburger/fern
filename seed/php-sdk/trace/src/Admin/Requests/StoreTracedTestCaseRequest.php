<?php

namespace Seed\Admin\Requests;

use Seed\Core\JsonProperty;
use Seed\Submission\Types\TestCaseResultWithStdout;
use Seed\Core\ArrayType;
use Seed\Submission\Types\TraceResponse;

class StoreTracedTestCaseRequest
{
    #[JsonProperty("result")]
    /**
     * @var TestCaseResultWithStdout $result
     */
    public TestCaseResultWithStdout $result;

    #[JsonProperty("traceResponses"), ArrayType([TraceResponse::class])]
    /**
     * @var array<TraceResponse> $traceResponses
     */
    public array $traceResponses;

}
