@extends('layouts.app')

@php
    $dayOfWeek = array('Monday' => 'Lunedi', 'Tuesday' => 'Martedì', 'Wednesday' => 'Mercoledì', 'Thursday' => 'Giovedì', 'Friday' => 'Venerdì', 'Saturday' => 'Sabato', 'Sunday' => 'Domenica',)
@endphp

@section('content')
<section class="d-flex justify-content-center py-5 my_bg">
    <form method="POST" action="{{ route('restaurant.update', $restaurant) }}" enctype="multipart/form-data" class="form">
        @csrf
        <div class="d-flex">
            <img class="Logo_filter" src="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png" alt="logo" width="50" height="50"> 
            <h1 class="text-dark">Aggiorna info sul tuo ristorante</h1>
        </div>

        <div class="d-flex gap-4">
            <div>
                <label for="name">Nome</label>
                <div>
                    <input type="text" class="text-dark" name="name" value="{{ $restaurant -> name }}">
                </div>

                <label for="description">Descrizione</label>
                <div>
                    <input type="text" class="text-dark" name="description" value="{{ $restaurant -> description }}">
                </div>

                <label for="place">Indirizzo</label>
                <div>
                    <input type="text" class="text-dark" name="place" value="{{ $restaurant -> place }}">
                </div>

                <label for="phone_number">Recapito Telefonico</label>
                <div>
                    <input type="text" class="text-dark" name="phone_number" value="{{ $restaurant -> phone_number }}">
                </div>

                <label for="vat">P.Iva</label>
                <div>
                    <input type="text" class="text-dark" name="vat" value="{{ $restaurant -> vat }}">
                </div>

                <label for="shipping_cost">Costo di spedizione</label>
                <div>
                    <input type="number" class="text-dark" step="0.01" min="0" name="shipping_cost" value="{{ $restaurant -> shipping_cost }}">
                </div>

                <label for="opening_time">Orario di apertura</label>
                <div>
                    <input type="time" class="text-dark" name="opening_time" value="{{ $restaurant -> opening_time }}">
                </div>

                <label for="closing_time">Orario di chiusura</label>
                <div>
                    <input type="time" class="text-dark" name="closing_time" value="{{ $restaurant -> closing_time }}">
                </div>

                <label for="closing_day">Giorno di chiusura</label>
                <div>
                    <select name="closing_day" class="form-select form-select text-dark" aria-label=".form-select text-dark example">
                        @foreach ($dayOfWeek as $day => $giorno)
                            <option value="{{ $day }}" {{ $restaurant -> closing_day == $day ? 'selected' : '' }}>{{ $giorno }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="img">Immagine ristorante</label>
                <div>
                    <input type="file" name="img">
                </div>
            </div>

            <div class="d-flex col">
                <ul>
                    <h3 class="text-dark">Categorie:</h3>
                    @foreach ($categories as $category)
                    <li>
                        <input type="radio" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}" class="mb-2 mx-2"
                        @foreach ($restaurant -> categories as $restaurantCategory)
                            @checked ($restaurantCategory -> id == $category -> id)
                        @endforeach>
                        <label for="{{ $category -> id }}">{{ $category -> name }}</label>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <input type="submit" value="Aggiorna">
        </div>
    </form>
</section>
@endsection