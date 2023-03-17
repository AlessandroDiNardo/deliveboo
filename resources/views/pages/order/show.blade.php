@extends('layouts.Products')

@section('content')

ORDINI RICEVUTI:
@foreach ($restaurant -> orders as $order)

<h6 class="text-dark">ID: {{ $order -> id}}</h6>
<h6 class="text-dark">PREZZO: {{ $order -> price}}</h6>
 
@endforeach

@endsection