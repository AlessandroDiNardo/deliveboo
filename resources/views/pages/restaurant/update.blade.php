@extends('layouts.app')

@php
    $dayOfWeek = array('Monday' => 'Lunedi', 'Tuesday' => 'Martedì', 'Wednesday' => 'Mercoledì', 'Thursday' => 'Giovedì', 'Friday' => 'Venerdì', 'Saturday' => 'Sabato', 'Sunday' => 'Domenica',)
@endphp

@section('content')
    
    <section class="d-flex justify-content-center py-5 my_bg">
       
        <form class="form" method="POST" action="{{ route('restaurant.update', $restaurant) }}" enctype="multipart/form-data">
            <div class="d-flex">
                <img class="Logo_filter" src="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png" alt="logo" width="50" height="50"> 
                <h1>Modifica il tuo locale</h1>
        </div>
              <div class="d-flex gap-5">
                <div class="d-flex flex-column">
                    <label for="name">Nome</label>
                    <input required id="name" type="text" name="name" value="{{ $restaurant -> name }}">
                    <br>
    
                    <label for="description">Descrizione</label>
                    <input required class="input_description" type="text" name="description" value="{{ $restaurant -> description }}">
                    <br>
    
                    <label for="place">Luogo</label>
                    <input  type="text" name="place" value="{{ $restaurant -> place }}">
                    <br>
    
                    <label for="phone_number">Numero di telefono</label>
                    <input required id="input_phone" type="text" name="phone_number" value="{{ $restaurant -> phone_number }}">
                    <br>
    
                    <label for="img">Immagine ristorante</label>
                    <input required id="input_img" type="file" name="img">
                    <br>
    
                    <label for="vat">P.Iva</label>
                    <input  required id="input_vat" type="text" name="vat" value="{{ $restaurant -> vat }}">
                    <br>
    
                    <label for="opening_time">Orario di apertura</label>
                    <input required id="input_opening" type="time" name="opening_time" value="{{ $restaurant -> opening_time }}">
                    <br>
    
                    <label for="closing_time">Orario di chiusura</label>
                    <input required id="input_closing" type="time" name="closing_time" value="{{ $restaurant -> closing_time }}">
                    <br>
    
                    <label for="shipping_cost">Costo di spedizione</label>
                    <input type="number" step="0.01" min="0" name="shipping_cost" value="{{ $restaurant -> shipping_cost }}">
                    <br>
    
                    <label for="closing_day">Giorno di chiusura</label>
                    <select name="closing_day">
                        @foreach ($dayOfWeek as $day => $giorno)
                            <option value="{{ $day }}" {{ $restaurant -> closing_day == $day ? 'selected' : '' }}>{{ $giorno }}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
                <div class="d-flex col" >
                    <div >
                     <label><h3>Categorie :</h3></label>
                     <br>
                     @foreach ($categories as $category)
                         <input type="checkbox" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}"
                         @foreach ($restaurant -> categories as $restaurantCategory)
                             @checked ($restaurantCategory -> id == $category -> id)
                         @endforeach
                         >
                         <label for="{{ $category -> id }}">{{ $category -> name }}</label>
                         <br>
                     @endforeach
                    </div>
 
                 </div>
              </div>

              
            <input id="submit" class="btn btn-success my-3" type="submit" value="Aggiorna" class="text-center">
           
        </form>
    </section>
@endsection