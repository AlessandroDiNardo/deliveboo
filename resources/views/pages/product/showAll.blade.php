@extends('layouts.app')

@section('content')

{{-- @foreach ( $restaurant -> products as $product)
    <h3 class="mt-1 text-sm text-gray-600">
        {{ $product -> name }}
    </h3>

    <p class="mt-1 text-sm text-gray-600">
        {{ $product -> ingredients }}
    </p>

    <img src="{{ asset('storage/' . $product -> img) }}" alt="productimg">
@endforeach
    <a href="{{ route('product.create') }}" class="btn btn-success w-20">
        Aggiungi Piatto
    </a>  --}}
    @foreach ( $restaurant -> products as $product)
    <div class="card" style="width: 18rem;">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/' . $product -> img) }}" class="card-img-top" alt="productimg">
            <div class="card-body">
              <h3 class="card-title">{{ $product -> name }}</h3>
              <h5>Ingredienti:</h5>
              <p class="card-text">{{ $product -> ingredients }}</p>
              <a href="{{ route('restaurant.edit', $restaurant) }}" class="btn btn-warning ">
                Modifica Piatto
            </a>
    
            <a href="{{ route('restaurant.delete', $restaurant) }}" class="btn btn-danger ">
                Elimina Piatto
            </a>
            </div>
    </div>
      @endforeach
      <div>
      
        
</div>
@endsection