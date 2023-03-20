@extends('layouts.app')
@section('content')

<section>

    <h1 class="text-center py-5">
        Accedi o Registrati per usufrutire del nostro servizio!
    </h1>
        
        <div class="d-flex justify-content-center align-items-center gap-5">
            <button class="btn btn-success">
                <a class="text-white text-decoration-none py-5 px-5" href="{{ route('login') }}">{{ __('Accedi') }}</a>
            <button>

            <button class="btn btn-success">
                <a class="text-white text-decoration-none py-3 px-5" href="{{ route('register') }}">{{ __('Registrati') }}</a>
            <button>
        </div>
</section>
@endsection