@extends('layouts.app')

@php
    $dayOfWeek = array(''=>'Seleziona un giorno','Monday' => 'Lunedi', 'Tuesday' => 'Martedì', 'Wednesday' => 'Mercoledì', 'Thursday' => 'Giovedì', 'Friday' => 'Venerdì', 'Saturday' => 'Sabato', 'Sunday' => 'Domenica',)
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
                    <input required id="name" class="name_create" type="text" name="name" value="{{ $restaurant -> name }}">
                    <span role="alert" class="nameError" aria-hidden="true">
                        Riempi il campo del nome del ristorante
                        
                     </span>
                    <br>
    
                    <label for="description">Descrizione</label>
                    <input required class="input_description" type="text" name="description" value="{{ $restaurant -> description }}">
                    <span role="alert"   class="inputDescriptionError" aria-hidden="true">
                        Riempi il campo della descrizione
                     </span>
                    <br>
    
                    <label for="place">Luogo</label>
                    <input  required class="input_place" type="text" name="place" value="{{ $restaurant -> place }}">
                    <span role="alert" class="input_placeError" aria-hidden="true">
                        Aggiungi l'indirizzo
                     </span>
                    <br>
    
                    <label for="phone_number">Numero di telefono</label>
                    <input required class="input_phone"  type="text" name="phone_number" value="{{ $restaurant -> phone_number }}">
                    <span role="alert" class="input_phoneError" aria-hidden="true">
                        Aggiungi Recapito telefonico
                     </span>
                    <br>

                    <label for="vat">P.Iva</label>
                    <input  required class="input_vat" type="text" name="vat" value="{{ $restaurant -> vat }}">
                    <span role="alert" class="input_vatError" aria-hidden="true">
                        Aggiungi Partita Iva
                     </span>
                    
                    <br>

                    <label for="shipping_cost">Costo di spedizione</label>
                    <input required class="shipping_field" type="number" step="0.01" min="0" name="shipping_cost" value="{{ $restaurant -> shipping_cost }}">
                    <span role="alert" class="input_shippingError" aria-hidden="true">
                        Aggiungi Spesa di spedizione
                     </span>
                    <br>
    
                    <label for="opening_time">Orario di apertura</label>
                    <input required class="input_opening" type="time" name="opening_time" value="{{ $restaurant -> opening_time }}">
                    <span role="alert" class="input_openError" aria-hidden="true">
                        Aggiungi orario di Apertura
                     </span>
                    <br>
    
                    <label for="closing_time">Orario di chiusura</label>
                    <input required class="input_closing" type="time" name="closing_time" value="{{ $restaurant -> closing_time }}">
                    <span role="alert" class="input_closingError" aria-hidden="true">
                        Aggiungi orario di Chiusura
                     </span>
                    <br>
    
                    <label for="closing_day">Giorno di chiusura</label>
                    <select required class="day_off" name="closing_day">
                        @foreach ($dayOfWeek as $day => $giorno)
                            <option value="{{ $day }}" {{ $restaurant -> closing_day == $day ? 'selected' : '' }}>{{ $giorno }}</option>
                        @endforeach
                    </select>
                    <span role="alert" class="input_dayOffError" aria-hidden="true">
                        Aggiungi giorno di Chiusura
                     </span>
                     
                    <br>

                    <label for="img">Immagine ristorante</label>
                    <input  required class="input_img" type="file" name="img">
                    <span role="alert" class="input_imgError" aria-hidden="true">
                        Aggiungi un immagine
                     </span>
                    <br>
                    
                </div>
                <div class="d-flex col" >
                    <div >
                     <label><h3>Categorie :</h3></label>
                     <br>
                     <span role="alert" class="input_categoryError" aria-hidden="true">
                        Seleziona una categoria
                      </span>
                     @foreach ($categories as $category)
                         <input class="category" type="checkbox" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}"
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

              
            <input class="submit_form" class="btn btn-success my-3" type="submit" value="Aggiorna" class="text-center">
           
        </form>
    </section>
@endsection