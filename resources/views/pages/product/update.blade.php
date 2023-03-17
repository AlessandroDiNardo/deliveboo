@extends('layouts.Products')

@php
    $visible = array( 1 => 'Disponibile', 0 => 'Non Disponibile',)
@endphp

@section('content')
<section class="d-flex justify-content-center py-5 my_bg" >
    <form class="form d-flex flex-column" method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
        <h1>Modifica Piatto</h1>
        @csrf
    
        <label for="name">Nome</label>
        <input  required class="nameProduct" type="text" name="name" value="{{ $product -> name }}"> 
        <span role="alert" class="nameProductError" aria-hidden="true">
            Riempi il campo del nome del Piatto
         </span>
        <br>
    
        <label for="ingredients">Ingredienti</label>
        <input required class="ingredients" type="text" name="ingredients" value="{{ $product -> ingredients }}">
        <span role="alert" class="ingredentsError" aria-hidden="true">
            Inserisci almeno un ingrediente
          </span>
        <br>
    
        <label for="price">Prezzo</label>
        <input required class="price type="number" name="price" value="{{ $product -> price }}">
        <span role="alert" class="priceError" aria-hidden="true">
            Aggiungi il prezzo
         </span>
        <br>
    
        <label for="img">Immagine</label>
        <input required class="imgProduct" type="file" name="img">
        <span role="alert" class="imgError" aria-hidden="true">
            Aggiungi un Immagine
         </span>
        <br>
    
        <label for="visible">Disponibilità</label>
        <select  class="disponibility my-2  text-center"name="visible">
            @foreach ($visible as $boolean => $value)
                <option value="{{ $boolean }}" {{ $product -> visible == $boolean ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
        <span role="alert" class="disponibilityError" aria-hidden="true">
            Aggiungi un campo
          </span>
        <br>
    
        <input class="submit" type="submit" value="Aggiorna Piatto">
    </form>
</section>

@endsection