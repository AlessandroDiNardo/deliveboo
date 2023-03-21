@extends('layouts.app')
@section('content')

<div class="container ">
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
            <img src="{{ str_contains($restaurant -> img, 'http') ? $restaurant -> img : asset('storage/' . $restaurant -> img) }}" alt="restaurantimg" class="col-3">
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

                <button type="button" class="btn btn-danger w-25" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Elimina Ristorante
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">

                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cancellazione ristorante!</h1>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>

                            <div class="modal-body">
                                Questa azione cancellerà per sempre il tuo ristorante e i suoi dati, compresi tutti i prodotti e lo storico ordini.
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <a href="{{ route('restaurant.delete', $restaurant) }}" class="text-reset text-decoration-none">
                                    <button type="button" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                    <a href="{{ route('product.showAll') }}" class="btn btn-success w-25">
                        Vai ai Prodotti
                    </a>

                    <a href="{{ route('order.show') }}" class="btn btn-primary w-25">
                        Visualizza gli Ordini
                    </a>
                </div>
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
