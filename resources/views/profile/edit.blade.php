@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Profile') }}
    </h2>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">

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
