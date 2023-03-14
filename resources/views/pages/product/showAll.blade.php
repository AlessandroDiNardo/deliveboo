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
        <div class="card-deck  d-flex align-items-center justify-content-center gap-3 p-3 " >
            <div class="card " style="width: 18rem;">
                <img src="{{ str_contains($product -> img, 'http') ? $product -> img : asset('storage/' . $product -> img) }}" alt="Card image cap" class="col-4 card-img-top">
                <div class=" text text-center">
                    <h3 class="card-title category font-weight-bold mt-3">{{ $product -> name }}</h3>
                    <h6 class="text-dark">Prezzo: {{ $product -> price }}</h6>
                    <h5>Ingredienti:</h5>
                    <p class="card-text font-weight-bold mt-2">{{ $product -> ingredients }}</p>
                    <a href="#" class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('product.edit', $product) }}" class="btn btn-outline-success my-2">
                            Modifica Piatto
                        </a>
        
                        <a href="{{ route('product.delete', $product) }}" class="btn btn-outline-danger my-2">
                            Elimina Piatto
                        </a>
                       
                    </a>
                   
                </div>
        </div>

        
        @endforeach 

    @endsection