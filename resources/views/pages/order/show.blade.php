@extends('layouts.Products')

@section('content')

<div class="container-xl container-ls container-md container-sm ms_order_container">
    <h2 class="text-center py-5 fw-bold">ORDINI RICEVUTI</h2>
    <div class="table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
        <table class=" table table-success table-striped table-bordered mb-5">
            <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">Codice</th>
                <th scope="col" class="text-center col-xl-2 col-lg-1 col-md-1 col-sm-1">Data Spedizione</th>
                <th scope="col" class="text-center col-xl-2 col-lg-1 col-md-1 col-sm-1">Prezzo</th>
                <th scope="col" class="text-center col-xl-3 col-lg-1 col-md-2 col-sm-1">Elenco Prodotti</th>
                <th scope="col" class="text-center col-xl-1 col-lg-1 col-md-1 col-sm-1">Telefono Rider</th>
                <th scope="col" class="text-center col-xl-1 col-lg-1 col-md-1 col-sm-1">Nome Acquirente</th>
                <th scope="col" class="text-center col-xl-1 col-lg-1 col-md-1 col-sm-1">Cognome Acquirente</th>
                <th scope="col" class="text-center col-xl-3 col-lg-1 col-md-1 col-sm-1">E-Mail Acquirente</th>
                <th scope="col" class="text-center col-xl-3 col-lg-1 col-md-1 col-sm-1">Telefono Acquirente</th>
                <th scope="col" class="text-center col-xl-3 col-lg-1 col-md-1 col-sm-1">Indirizzo</th>
            </tr>
            </thead>
            <tbody class="table-success">
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->code }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->price }} €</td>
                    <td>
                        <ul>
                            @php
                                $currentProduct = null;
                                $count = 0;
                            @endphp
                            @foreach($order->products as $product)
                                @if ($currentProduct !== null && $currentProduct->id !== $product->id)
                                    <li>{{ $currentProduct->name }} ({{ $count }})</li>
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
                                <li>{{ $currentProduct->name }} ({{ $count }})</li>
                            @endif
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
        </table>
    </div>
</div>
@endsection