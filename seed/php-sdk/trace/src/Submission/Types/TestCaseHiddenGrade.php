<?php

namespace Seed\Submission\Types;

use Seed\Core\SerializableType;
use Seed\Core\JsonProperty;

class TestCaseHiddenGrade extends SerializableType
{
    /**
     * @var bool $passed
     */
    #[JsonProperty("passed")]
    public bool $passed;

    /**
     * @param bool $passed
     */
    public function __construct(
        bool $passed,
    ) {
        $this->passed = $passed;
    }
}
