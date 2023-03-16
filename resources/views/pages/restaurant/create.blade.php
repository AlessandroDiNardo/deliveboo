@extends('layouts.app')

@section('content')
<section class="d-flex justify-content-center py-5 my_bg ">
    <form class="form form-group" name="create" method="POST" action="{{ route('restaurant.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                <div class="mx-3">
                    <h1 class="mb-4">Aggiungi il tuo locale</h1>
                </div>
                <div class="form-group col-md-7 col-lg-5 col-xl-6">
                    <label for="name">Nome</label>
                    <div>
                        <input required id="name" type="text" name="name" >
                        <span role="alert" id="nameError" aria-hidden="true" >
                            Riempi il campo del nome del ristorante
                            <button type="button" class="btn-close-white" aria-label="Close"></button>
                        </span>
                    </div>
                
                    <label for="description">Descrizione</label>
                    <div>
                        <input required id="input_description" type="text" name="description" >
                        <span role="alert" id="inputDescriptionError" aria-hidden="true" >
                            Riempi il campo della descrizione
                         </span>
                    </div>
    
                    <label for="place">Indirizzo</label>
                    <div>
                        <input required id="input_place" type="text" name="place" >
                        <span role="alert" id="input_placeError" aria-hidden="true" >
                            Aggiungi l'indirizzo
                         </span>
                    </div>    
    
                    <label for="phone_number">Recapito Telefonico</label>
                    <div>
                        <input required id="input_phone" type="text" name="phone_number" >
                        <span role="alert" id="input_phoneError" aria-hidden="true" >
                            Aggiungi Recapito telefonico
                         </span>
                    </div>   
    
                    <label for="vat">Piva</label>
                    <div>
                        <input required id="input_vat" type="text" name="vat" >
                        <span role="alert" id="input_vatError" aria-hidden="true" >
                            Aggiungi Partita Iva
                         </span>
                    </div>
    
                    <label for="shipping_cost">Spesa spedizione</label>
                    <div>
                        <input required id="input_shipping" type="number" step="0.01" min="1" max="5"  requred name="shipping_cost" >
                        <span role="alert" id="input_shippingError" aria-hidden="true" >
                            Aggiungi Spesa di spedizione
                         </span>
                    </div> 
    
                    <label for="opening_time">Orario di Apertura</label>
                    <div>
                        <input required id="input_opening" type="time" name="opening_time">
                        <span role="alert" id="input_openError" aria-hidden="true">
                            Aggiungi orario di Apertura
                         </span>
                    </div>   
    
                    <label for="closing_time">Orario di Chiusura</label>
                    <div>
                        <input required id="input_closing" type="time" name="closing_time">
                        <span role="alert" id="input_closingError" aria-hidden="true">
                            Aggiungi orario di Chiusura
                         </span>
                    </div>
    
                    <label for="closing_day">Giorno di chiusura</label>
                    <div>
                        <input required id="day_off" type="text" name="closing_day">
                        <span role="alert" id="input_dayOffError" aria-hidden="true">
                            Aggiungi giorno di Chiusura
                         </span>
                    </div>
    
                    <label for="img">Inserisci un immagine</label><br><br>
                    <div>
                        <input required id="input_img" type="file" name="img">
                        <span role="alert" id="input_imgError" aria-hidden="true">
                            Aggiungi un immagine
                         </span>
                    </div>
    
                    <br>
                </div>
                
                <div  id="category" class="d-flex justify-content-end col">
                    
                    <ul class="col-6-md">
                        <h3>Categorie:</h3>
                        <span role="alert" id="input_categoryError" aria-hidden="true">
                            Seleziona una categoria
                          </span>
                        @foreach ($categories as $category)
                        <li>
                            <input required id="input_category" type="checkbox" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}" class="mb-2 mx-2">
                            <label for="{{ $category -> id }}">{{ $category -> name }}</label>
                        </li>
                       
                        @endforeach
                    </ul>
                </div>
            </div> 
            <input id="submit" type="submit"  value="CREATE NEW RESTAURANT" class=" text-center p-1">
     
    </form>
</section>
@endsection

      
    
          
