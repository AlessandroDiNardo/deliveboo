<?php

namespace App\Http\Controllers;

use App\Services\BraintreeService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $braintree;

    public function __construct(BraintreeService $braintree)
    {
        $this->braintree = $braintree;
    }

    public function checkout(Request $request)
    {
        $clientToken = $this->braintree->generateClientToken();

        // restituisce la vista del checkout con il clientToken
        return response() -> json([
            'success' => true,
            'response' => $clientToken,
        ]);
    }

    public function transaction(Request $request)
    {
        $nonceFromTheClient = $request -> payment_method_nonce;

        $transaction = $this->braintree->generateTransaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonceFromTheClient,
        ]);

        return response() -> json([
            'success' => true,
            'response' => $transaction,
        ]);
    }


    // altre funzioni del controller per elaborare le transazioni di Braintree
}