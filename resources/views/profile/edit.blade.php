@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Profile') }}
    </h2>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
        {{-- if restaurant with logged user id does not exist... --}}
        @if ($restaurant == null)
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Restaurant') }}
            </h2>
    
            <p class="mt-1 text-sm text-gray-600">
                {{ __("Add all your restaurant's info") }}
            </p>
        </header>
    
        <a href="{{ route('restaurant.create') }}" class="btn btn-success w-25">
            Aggiungi Ristorante
        </a>

        {{-- if exist... --}}
        @else

        <header class="row align-items-center">
            <img src="{{ asset('storage/' . $restaurant -> img) }}" alt="restaurantimg" class="col-3">
            <div class="col">

                <h2 class="text-lg font-medium text-gray-900">
                    {{ $restaurant -> name }}
                </h2>
                
                <p class="mt-1 text-sm text-gray-600">
                    {{ $restaurant -> description }}
                </p>
                
                <a href="{{ route('restaurant.edit', $restaurant) }}" class="btn btn-warning w-25">
                    Modifica Ristorante
                </a>

                <a href="{{ route('restaurant.delete', $restaurant) }}" class="btn btn-danger w-25">
                    Elimina Ristorante
                </a>

                {{-- @foreach ( $restaurant -> products as $product)
            {{-- product --}}
            {{-- <h3 class="mt-1 text-sm text-gray-600">
                {{ $product -> name }}
            </h3>

            <p class="mt-1 text-sm text-gray-600">
                {{ $product -> ingredients }}
            </p>
                
            @endforeach
            <a href="{{ route('product.create') }}" class="btn btn-success w-20">
                Aggiungi Piatto
            </a>  --}}

            </div>
        </header>
        @endif

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
        
</div>

@endsection
