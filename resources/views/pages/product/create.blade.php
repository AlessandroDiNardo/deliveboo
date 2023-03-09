@extends('layouts.app')

@section('content')
<h1>CREA UN NUOVO PIATTO</h1>
<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
@endsection