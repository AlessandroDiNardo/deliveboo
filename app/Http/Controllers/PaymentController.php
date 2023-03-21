<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Services\BraintreeService;
use Illuminate\Http\Request;

// imported Models
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

use App\Mail\NewOrderRestaurant;
use App\Mail\NewOrderBuyer;

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

        // creo una variabile in cui calcolare il prezzo totale dell'ordine 
        $orderPrice = 0;

        // creo una variabile in cui salvare restaurant
        $restaurant = null;

        // per ogni id in $productsIds aggiungi il corrispondente prodotto nella collection vuota
        foreach ($productsIds as $key => $id) {
            // trova il prodotto per id
            $newProduct = Product::where('id', $id) -> first();

            // aggiungi alla somma il prezzo del prodotto
            $orderPrice += $newProduct -> price;

            // quando il ciclo arriva all'ultimo prodotto...
            if ($key == count($productsIds) - 1) {

                // salva ristorante
                $restaurant = Restaurant::where('id', $newProduct -> restaurant_id) -> first();

                // aggiungi alla somma lo shipping_cost del ristorante da cui si acquista
                $orderPrice +=  $restaurant -> shipping_cost;
            }
        }

        // aggiungi la key price con l'intero prezzo all'array $data
        $data['price'] = $orderPrice;

        // aggiunge data reale
        $data['order_date'] = Carbon::now()->addHour();

        // esegui la transazione con Braintree
        $transaction = $this->braintree->generateTransaction()->sale([
            'amount' => $orderPrice,
            'paymentMethodNonce' => $nonceFromTheClient,
        ]);

        $order = null;

        // se va a buon fine salva ordine
        if ($transaction -> success) {
            $order = $this -> orderStore($data, $productsIds, $restaurant);
        }

        return response() -> json([
            'success' => true,
            'response' => [
                'transaction' => $transaction,
                'order' => $order
            ],
        ]);
    }


    public function orderStore($data, $productsIds, $restaurant) {

        // crea un ordine prendendo i dati da $data e riempiendo quelli vuoti usando la factory
        $order = Order::factory() -> make($data);

        $order -> restaurant() -> associate($restaurant);

        $order -> save();

        $order -> products() -> attach($productsIds);

        Mail::to($restaurant -> user -> email)
            -> send(new NewOrderRestaurant($order));

        Mail::to($order -> buyer_email)
        -> send(new NewOrderBuyer($order));

        return $order;
    } 


    // altre funzioni del controller per elaborare le transazioni di Braintree
}