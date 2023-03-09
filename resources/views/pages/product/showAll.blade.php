@extends('layouts.app')

@section('content')

@foreach ( $restaurant -> products as $product)
<div class="card" style="width: 18rem;">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/' . $product -> img) }}" class="card-img-top" alt="productimg">
        <div class="card-body">
            <h3 class="card-title">{{ $product -> name }}</h3>
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
        
<a href="{{ route('product.create') }}" class="btn btn-success w-20">
    Aggiungi Piatto
</a>

@endsection