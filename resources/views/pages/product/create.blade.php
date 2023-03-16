@extends('layouts.Products')

@section('content')

<section class="d-flex justify-content-center py-5 my_bg">
    <form class="form d-flex flex-column" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        <div class="d-flex justify-content-center">
            <img class="Logo_filter" src="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png" alt="logo" width="50" height="50"> 
        <h1>CREA UN NUOVO PIATTO</h1>
        </div>
        @csrf
    
        <label for="name">Nome</label>
        <input required class="nameProduct" id="name" type="text" name="name">
        <span role="alert" class="nameProductError" aria-hidden="true">
            Riempi il campo del nome del Piatto
         </span>
        <br>
    
        <label for="ingredients">Ingredienti</label>
        <input required class="ingredients" type="text" name="ingredients">
        <span role="alert" class="ingredentsError" aria-hidden="true">
           Inserisci almeno un ingrediente
         </span>
        <br>
    
        <label for="price">Prezzo</label>
        <input required class="price"  step="0.01" min="0" max="30" type="number" name="price">
         <span role="alert" class="priceError" aria-hidden="true">
            Aggiungi il prezzo
         </span>
        <br>
    
        <label for="img">Immagine</label>
        <input class="imgProduct" type="file" name="img">
        <span role="alert" class="imgError" aria-hidden="true">
            Aggiungi un Immagine
         </span>
        <br>
    
        <label for="visible">Disponibilità</label>
        <select class="disponibility my-2" name="visible">
        <option value="" selected>Seleziona Disponibilità</option>   
        <option value="1" selected>Disponibile</option>
        <option value="0">Non Disponibile</option>
        </select>
         <span role="alert" class="disponibilityError" aria-hidden="true">
           Aggiungi un campo
         </span>
        <br>
    
        <input class="my-2 submit  "  type="submit" value="CREA UN NUOVO PIATTO">
    </form>
</section>
@endsection