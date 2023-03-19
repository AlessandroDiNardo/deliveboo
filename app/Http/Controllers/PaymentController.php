<?php

namespace App\Http\Controllers;

use App\Services\BraintreeService;
use Illuminate\Http\Request;

// imported Models
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

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
        // metodo di pagamento
        $nonceFromTheClient = $request -> paymentInfo['payment_method_nonce'];

        // salva orderInfo in $data e rimuovi productsIds
        $data = $request -> orderInfo;
        unset($data['productsIds']);
        
        // salva i productsIds in una variabile
        $productsIds = $request -> orderInfo['productsIds'];
        // crea una collection vuota di products
        $products = collect();

        // creo una variabile in cui calcolare il prezzo totale dell'ordine 
        $orderPrice = 0;

        // per ogni id in $productsIds aggiungi il corrispondente prodotto nella collection vuota
        foreach ($productsIds as $id) {
            $newProduct = Product::where('id', $id) -> first();

            $orderPrice += $newProduct -> price;

            $products -> push($newProduct);
        }

        $data['price'] = $orderPrice;

        // crea un ordine prendendo i dati da $data e riempiendo quelli vuoti usando la factory
        $order = Order::factory() -> make($data);

        $transaction = $this->braintree->generateTransaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonceFromTheClient,
        ]);

        return response() -> json([
            'success' => true,
            // DEBUG
            'response' => $order,
        ]);
    }


    // altre funzioni del controller per elaborare le transazioni di Braintree
}