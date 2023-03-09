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
            <h2 class="text-lg font-medium text-gray-900">
                {{ $restaurant -> name }}
            </h2>
    
            <p class="mt-1 text-sm text-gray-600">
                {{ $restaurant -> description }}
            </p>
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
