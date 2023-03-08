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
            Add Restaurant
        </a>

        {{-- if exist... --}}
        @else

        <header>
            {{-- restaurant --}}
            <h2 class="text-lg font-medium text-gray-900">
                {{ $restaurant -> name }}
            </h2>
    
            <p class="mt-1 text-sm text-gray-600">
                {{ $restaurant -> description }}
            </p>
            
            @foreach ( $restaurant -> products as $product)
            {{-- product --}}
            <h3 class="mt-1 text-sm text-gray-600">
                {{ $product -> name }}
            </h3>

            <p class="mt-1 text-sm text-gray-600">
                {{ $product -> ingredients }}
            </p>
                
            @endforeach
            <a href="{{ route('product.create') }}" class="btn btn-success w-20">
                Aggiungi Piatto
            </a>

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
