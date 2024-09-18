<?php

namespace Seed\Payment\Requests;

use Seed\Core\JsonProperty;
use Seed\Payment\Types\Currency;

class CreatePaymentRequest
{
    #[JsonProperty("amount")]
    /**
     * @var int $amount
     */
    public int $amount;

    #[JsonProperty("currency")]
    /**
     * @var Currency $currency
     */
    public Currency $currency;

}
