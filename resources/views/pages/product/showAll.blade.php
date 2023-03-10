@extends('layouts.app')

@section('content')

<br>
<div class="d-grid gap-2 d-md-flex d-flex justify-content-center">
<a href="{{ route('product.create') }}" class="btn btn-success w-1 text-center">
    Aggiungi Piatto
</a>
</div>
<br>

@foreach ( $restaurant -> products as $product)
<div class="card" style="width: 18rem;">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/' . $product -> img) }}" class="card-img-top" alt="productimg">
        <div class="card-body">
            <h3 class="card-title">{{ $product -> name }}</h3>
            <h6>Prezzo: {{ $product -> price }}</h6>
            <h5>Ingredienti:</h5>
            <p class="card-text">{{ $product -> ingredients }}</p>
            <a href="{{ route('product.edit', $product) }}" class="btn btn-warning ">
            Modifica Piatto
        </a>

        <a href="{{ route('product.delete', $product) }}" class="btn btn-danger ">
            Elimina Piatto
        </a>
        </div>
</div>
@endforeach 

@endsection