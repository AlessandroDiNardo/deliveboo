@extends('layouts.app')
@section('content')

<section>

    <h1 class="text-center py-5">
        <span class="bold text-warning">Accedi</span> o <span class="bold text-info">Registrati</span> per usufrutire del nostro servizio!
    </h1>
        
        <div class="d-flex justify-content-center align-items-center gap-5">
            <button class="btn btn-warning">
                <a class="text-white text-decoration-none py-5 px-5" href="{{ route('login') }}">{{ __('Accedi') }}</a>
            <button>

            <button class="btn btn-info">
                <a class="text-white text-decoration-none py-3 px-5" href="{{ route('register') }}">{{ __('Registrati') }}</a>
            <button>
        </div>
</section>
@endsection