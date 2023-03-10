@extends('layouts.app')

@php
    $dayOfWeek = array('Monday' => 'Lunedi', 'Tuesday' => 'Martedì', 'Wednesday' => 'Mercoledì', 'Thursday' => 'Giovedì', 'Friday' => 'Venerdì', 'Saturday' => 'Sabato', 'Sunday' => 'Domenica',)
@endphp

@section('content')
<section class="d-flex justify-content-center py-5 my_bg">
    <form class="form" method="POST" action="{{ route('restaurant.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex">
                <img class="Logo_filter" src="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png" alt="logo" width="50" height="50"> 
                <h1>Aggiungi il tuo locale</h1>
        </div>
        <div class="d-flex gap-4">
            <div>
                <label for="name">Nome</label>
                <div>
                    <input type="text" name="name">
                </div>
            
                <label for="description">Descrizione</label>
                <div>
                    <input type="text" name="description">
                </div>

                <label for="place">Indirizzo</label>
                <div>
                    <input type="text" name="place">
                </div>    

                <label for="phone_number">Recapito Telefonico</label>
                <div>
                    <input type="text" name="phone_number">
                </div>   

                <label for="vat">Piva</label>
                <div>
                    <input type="text" name="vat">
                </div>

                <label for="shipping_cost">Costo di spedizione</label>
                <div>
                    <input type="number" step="0.01" min="1" max="5" name="shipping_cost">
                </div>       

                <label for="opening_time">Orario di Apertura</label>
                <div>
                    <input type="time" name="opening_time">
                </div>   

                <label for="closing_time">Orario di Chiusura</label>
                <div>
                    <input type="time" name="closing_time">
                </div>

                <label for="closing_day">Giorno di chiusura</label>
                <div>
                    <select name="closing_day">
                        @foreach ($dayOfWeek as $day => $giorno)
                            <option value="{{ $day }}" {{ $restaurant -> closing_day == $day ? 'selected' : '' }}>{{ $giorno }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="img">Inserisci un immagine</label><br><br>
                <div>
                    <input type="file" name="img">
                </div>

                <br>
            </div>
            
            <div class="d-flex col">
                <ul>
                    <h3>Categorie:</h3>
                    @foreach ($categories as $category)
                    <li>
                        <input type="checkbox" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}" class="mb-2 mx-2">
                        <label for="{{ $category -> id }}">{{ $category -> name }}</label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <input type="submit" value="CREATE NEW RESTAURANT">
        </div>
    </form>
</section>
@endsection