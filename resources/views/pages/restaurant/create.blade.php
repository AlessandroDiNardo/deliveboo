@extends('layouts.app')

@section('content')
<h1>Crea il tuo ristorante</h1>
<form method="POST" action="{{ route('restaurant.store') }}" enctype="multipart/form-data">
    @csrf

    <label for="name">Nome</label>
    <input type="text" name="name">
    <br>

    <label for="description">Descrizione</label>
    <input type="text" name="description">
    <br>

    <label for="place">Luogo</label>
    <input type="text" name="place">
    <br>

    <label for="phone_number">Numero di telefono</label>
    <input type="text" name="phone_number">
    <br>

    <label for="img">Immagine ristorante</label>
    <input type="file" name="img">
    <br>

    <label for="vat">P.Iva</label>
    <input type="text" name="vat">
    <br>

    <label for="opening_time">Orario di apertura</label>
    <input type="time" name="opening_time">
    <br>

    <label for="closing_time">Orario di chiusura</label>
    <input type="time" name="closing_time">
    <br>

    <label for="shipping_cost">Costo di spedizione</label>
    <input type="number" step="0.01" min="0" name="shipping_cost">
    <br>

    <label for="closing_day">Giorno di chiusura</label>
    <select name="closing_day">
        <option value="Monday" selected>Lunedì</option>
        <option value="Tuesday">Martedi</option>
        <option value="Wednesday">Mercoledì</option>
        <option value="Thursday">Giovedì</option>
        <option value="Friday">Venerdì</option>
        <option value="Saturday">Sabato</option>
        <option value="Sunday">Domenica</option>
      </select>
    <br>

    <label>Categorie ristorante</label>
    <br>
    @foreach ($categories as $category)
        <input type="checkbox" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}">
        <label for="{{ $category -> id }}">{{ $category -> name }}</label>
        <br>
    @endforeach
    <input type="submit" value="Crea">
</form>
@endsection