@extends('layouts.app')

@section('content')
<section class="d-flex justify-content-center py-5 my_bg">
    <form class="form" name="create" method="POST" action="{{ route('restaurant.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-center pt-3">
                <img class="Logo_filter" src="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png" alt="logo" width="50" height="50"> 
                <h1>Aggiungi il tuo locale</h1>
        </div>
        <div class="d-flex gap-4">
            <div>
                <label for="name">Nome</label>
                <div>
                    <input required id="name" class="name_create" type="text" name="name" >

                   <span role="alert" class="nameError" aria-hidden="true">
                       Riempi il campo del nome del ristorante
                       
                    </span>
                </div>
            
                <label for="description">Descrizione</label>
                <div>
                    <input required class="input_description" type="text" name="description">
                    <span role="alert"   class="inputDescriptionError" aria-hidden="true">
                        Riempi il campo della descrizione
                     </span>
                    
                </div>

                <label for="place">Indirizzo</label>
                <div>
                    <input required class="input_place" type="text" name="place">
                    <span role="alert" class="input_placeError" aria-hidden="true">
                        Aggiungi l'indirizzo
                     </span>
                </div>    

                <label for="phone_number">Recapito Telefonico</label>
                <div>
                    <input required class="input_phone" type="text" name="phone_number">
                    <span role="alert" class="input_phoneError" aria-hidden="true">
                        Aggiungi Recapito telefonico
                     </span>
                </div>   

                <label for="vat">Piva</label>
                <div>
                    <input required max="1" class="input_vat" type="text" name="vat" >
                  <span role="alert" class="input_vatError" aria-hidden="true">
                        Aggiungi Partita Iva
                     </span>
                </div>

                <label for="shipping_cost">Spesa spedizione</label>
                <div>
                    <input required class="shipping_field" type="number" step="0.01" min="0" max="5"  required name="shipping_cost">
                    <span role="alert" class="input_shippingError" aria-hidden="true">
                        Aggiungi Spesa di spedizione
                     </span>
                </div>       

                <label for="opening_time">Orario di Apertura</label>
                <div>
                    <input required class="input_opening" type="time" name="opening_time">
                    <span role="alert" class="input_openError" aria-hidden="true">
                        Aggiungi orario di Apertura
                     </span>
                </div>   

                <label for="closing_time">Orario di Chiusura</label>
                <div>
                    <input required class="input_closing" type="time" name="closing_time">
                    <span role="alert" class="input_closingError" aria-hidden="true">
                        Aggiungi orario di Chiusura
                     </span>
                </div>

                <label for="closing_day">Giorno di chiusura</label>
                <div>
                    <select required class="day_off py-2 px-4 bg-success border-success rounded-3 text-light" name="closing_day">
                        <option value="" >Seleziona un Giorno: </option>
                        <option value="Monday" >Lunedì</option>
                        <option value="Tuesday">Martedi</option>
                        <option value="Wednesday">Mercoledì</option>
                        <option value="Thursday">Giovedì</option>
                        <option value="Friday">Venerdì</option>
                        <option value="Saturday">Sabato</option>
                        <option value="Sunday">Domenica</option>
                      </select>
                    <span role="alert" class="input_dayOffError" aria-hidden="true">
                        Aggiungi giorno di Chiusura
                     </span>
                </div>

                <label for="img" class="mt-3">Inserisci un immagine</label><br><br>
                <div>
                    <input required class="input_img mt-0" type="file" name="img">
                    <span role="alert" class="input_imgError" aria-hidden="true">
                        Aggiungi un immagine
                     </span>
                </div>

                <br>
            </div>
            
            <div class="d-flex col">
                
                <ul>
                    <h3>Categorie:</h3>
                    <span role="alert" class="input_categoryError" aria-hidden="true">
                        Seleziona una categoria
                      </span>
                    @foreach ($categories as $category)
                    <li>
                        <input  class="category" type="checkbox" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}" class="mb-2 mx-2">
                        <label for="{{ $category -> id }}">{{ $category -> name }}</label>
                    </li>
                   
                    @endforeach
                </ul>
            </div>
        </div>
        <input  class="submit_form" type="submit"  value="CREATE NEW RESTAURANT" class="text-center">
     
    </form>
</section>
@endsection

      
    
          
