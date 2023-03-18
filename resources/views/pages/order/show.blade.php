@extends('layouts.Products')

@section('content')

<div class="container">
    <br>
    <h3 class="text-center">ORDINI RICEVUTI:</h3>
    <br>
<table class="table table-success table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">Codice</th>
        <th scope="col" class="text-center">Prezzo</th>
        <th scope="col" class="text-center">Elenco Prodotti</th>
        <th scope="col" class="text-center">Telefono Rider</th>
        <th scope="col" class="text-center">Nome Acquirente</th>
        <th scope="col" class="text-center">Cognome Acquirente</th>
        <th scope="col" class="text-center">E-Mail Acquirente</th>
        <th scope="col" class="text-center">Telefono Acquirente</th>
        <th scope="col" class="text-center">Indirizzo</th>
      </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->code }}</td>
            <td>{{ $order->price }} €</td>
            <td>
                <ul>
                    @foreach($order->products as $product)
                    <li>{{ $product->name }} ({{ isset($product->pivot->quantity) ? $product->pivot->quantity : 1 }})</li>
                    @endforeach
                </ul>
            </td>
            <td>{{ $order->rider_phone_number }}</td>
            <td>{{ $order->buyer_first_name }}</td>
            <td>{{ $order->buyer_last_name }}</td>
            <td>{{ $order->buyer_email }}</td>
            <td>{{ $order->buyer_phone_number }}</td>
            <td>{{ $order->address }}</td>
            
        </tr>
        @endforeach
    </tbody>
</div>
@endsection