@extends('layouts.app')

@section('content')

@foreach ( $restaurant -> products as $product)
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
    </a> 
@endsection