<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h1>Ciao {{ $order -> buyer_first_name }}!</h1>
    <span>Ecco a te l'ordine #{{ $order -> code }} in arrivo:</span>    

    <h3>Prodotti:</h3>
    <ul style="list-style: none">
        @php
            $currentProduct = null;
            $count = 0;
        @endphp
        @foreach($order->products as $product)
            @if ($currentProduct !== null && $currentProduct->id !== $product->id)
                <li>- {{ $currentProduct->name }} x{{ $count }} - {{ number_format((float)$currentProduct -> price*$count, 2, '.', '') }}€</li>
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
            <li>- {{ $currentProduct->name }} x{{ $count }} - {{ number_format((float)$currentProduct -> price*$count, 2, '.', '') }}€</li>
        @endif
    </ul>

    <div>
        Costo di spedizione: {{$order -> restaurant -> shipping_cost}}€
    </div>

    <h4>
        Totale Ordine : {{ number_format((float)$order -> price, 2, '.', '') }}€
    </h4>

</body>
</html>