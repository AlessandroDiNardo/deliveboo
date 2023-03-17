<?php

namespace App\Services;

use Braintree\Gateway;

class BraintreeService
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway(config('braintree'));
    }

    public function generateClientToken()
    {
        return $this->gateway->clientToken()->generate();
    }

    // altre funzioni wrapper per il Braintree PHP SDK
}