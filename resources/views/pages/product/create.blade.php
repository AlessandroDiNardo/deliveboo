@extends('layouts.app')

@section('content')

<section class="d-flex justify-content-center py-5 my_bg">
    <form class="form d-flex flex-column" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        <div class="d-flex justify-content-center">
            <img class="Logo_filter" src="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png" alt="logo" width="50" height="50"> 
        <h1>CREA UN NUOVO PIATTO</h1>
        </div>
        @csrf
    
        <label for="name">Nome</label>
        <input type="text" name="name">
        <br>
    
        <label for="ingredients">Ingredienti</label>
        <input type="text" name="ingredients">
        <br>
    
        <label for="price">Prezzo</label>
        <input type="number" name="price">
        <br>
    
        <label for="img">Immagine</label>
        <input type="file" name="img">
        <br>
    
        <label for="visible">Disponibilità</label>
        <select name="visible">
        <option value="1" selected>Disponibile</option>
        <option value="0">Non Disponibile</option>
        </select>
        <br>
    
        <input type="submit" value="CREA UN NUOVO PIATTO">
    </form>
</section>
@endsection