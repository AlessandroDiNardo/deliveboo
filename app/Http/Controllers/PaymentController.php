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

        // salva orderInfo in $data
        $data = $request -> orderInfo;
        
        // salva i productsIds in una variabile
        $productsIds = $request -> paymentInfo['productsIds'];

        // crea una collection vuota di products
        // $products = collect();

        // creo una variabile in cui calcolare il prezzo totale dell'ordine 
        $orderPrice = 0;

        // per ogni id in $productsIds aggiungi il corrispondente prodotto nella collection vuota
        foreach ($productsIds as $key => $id) {
            // trova il prodotto per id
            $newProduct = Product::where('id', $id) -> first();

            // aggiungi alla somma il prezzo del prodotto
            $orderPrice += $newProduct -> price;

            // se il ciclo arriva all'ultimo prodotto
            if ($key == count($productsIds) - 1) {
                // aggiungi alla somma lo shipping_cost del ristorante da cui si acquista
                $orderPrice += Restaurant::where('id', $newProduct -> restaurant_id) -> first() -> shipping_cost;
            }

            // $products -> push($newProduct);
        }

        // aggiungi la key price con l'intero prezzo all'array $data
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