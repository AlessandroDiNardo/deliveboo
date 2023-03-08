@extends('layouts.app')

@section('content')
<section class="d-flex justify-content-center py-5 my_bg ">
    <div>
        
        <form class="form" method="POST" action="{{ route('restaurant.store') }}" enctype="multipart/form-data">
            @csrf
           <div class="d-flex">
            <img class="Logo_filter" src="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png" alt="logo" width="50" height="50"> 
           
            <h1>Aggiungi il tuo locale</h1>
           </div>
        
            <label for="name">Nome</label>
            <input type="text" name="name">
            <br>
        
            <label for="description">Descrizione</label>
            <input type="text" name="description">
            <br>
        
            <label for="place">Indirizzo</label>
            <input type="text" name="place">
            <br>
        
            <label for="phone_number">Recapito Telefonico</label>
            <input type="text" name="phone_number">
            <br>
        
            <label for="img">immagine</label>
            <input type="file" name="img">
            <br>
        
            <label for="vat">Piva</label>
            <input type="text" name="vat">
            <br>
        
            <label for="opening_time">Apertura</label>
            <input type="time" name="opening_time">
            <br>
        
            <label for="closing_time">Chiusura</label>
            <input type="time" name="closing_time">
            <br>
        
            <label for="shipping_cost">Spesa spedizione</label>
            <input type="number" step="0.01" min="0" name="shipping_cost">
            <br>
        
            <label for="closing_day">Giorno di chiusura</label>
            <input type="text" name="closing_day">
            <br>
        
            <label>Categorie</label>
            <br>
            @foreach ($categories as $category)
                <input type="checkbox" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}">
                <label for="{{ $category -> id }}">{{ $category -> name }}</label>
                <br>
            @endforeach
            <input type="submit" value="CREATE NEW RESTAURANT">
        </form>
    </div>
</section>
@endsection