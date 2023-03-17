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
        return response() -> json([
            'success' => true,
            'response' => $clientToken,
        ]);
    }


    // altre funzioni del controller per elaborare le transazioni di Braintree
}