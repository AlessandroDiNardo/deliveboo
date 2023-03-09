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
                Crea il tuo ristorante
            </h2>
    
            <p class="mt-1 text-sm text-gray-600">
                Aggiungi tutte le info necessarie
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

                <a href="{{ route('product.showAll') }}" class="btn btn-success w-25">
                    Vai ai Prodotti
                </a>

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
