<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h1>Ciao ristoratore!</h1>
    <span>Un utente ha appena creato un ordine per te:</span>
    <h3>#{{ $order -> code }}</h3>
    <div>
        Totale Ordine : {{ number_format((float)$order -> price, 2, '.', '') }}€
    </div>
    <h3>Info Utente</h3>

    <div>
        Nome e Cognome: {{ $order -> buyer_first_name . " " . $order -> buyer_last_name }} 

        <br>

        Numero di Telefono: {{ $order -> buyer_phone_number }}

        <br>

        Indirizzo: {{ $order -> address }}
    </div>

    <h3>Prodotti:</h3>
    <ul>
        @php
            $currentProduct = null;
            $count = 0;
        @endphp
        @foreach($order->products as $product)
            @if ($currentProduct !== null && $currentProduct->id !== $product->id)
                <li>{{ $currentProduct->name }} x{{ $count }}</li>
                @php
                    $count = 0;
                @endphp
            @endif
            @php
                $currentProduct = $product;
                $count++;
            @endphp
        @endforeach
        @if ($currentProduct !== null)
            <li>{{ $currentProduct->name }} x{{ $count }}</li>
        @endif
    </ul>

</body>
</html>