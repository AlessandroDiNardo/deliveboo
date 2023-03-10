@extends('layouts.app')

@php
    $visible = array( 1 => 'Disponibile', 0 => 'Non Disponibile',)
@endphp

@section('content')
<h1>Modifica Piatto</h1>
<form method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
    @csrf

    <label for="name">Nome</label>
    <input type="text" name="name" value="{{ $product -> name }}"> 
    <br>

    <label for="ingredients">Ingredienti</label>
    <input type="text" name="ingredients" value="{{ $product -> ingredients }}">
    <br>

    <label for="price">Prezzo</label>
    <input type="number" name="price" value="{{ $product -> price }}">
    <br>

    <label for="img">Immagine</label>
    <input type="file" name="img">
    <br>

    <label for="visible">Disponibilità</label>
    <select name="visible">
        @foreach ($visible as $boolean => $value)
            <option value="{{ $boolean }}" {{ $product -> visible == $boolean ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
    <br>

    <input type="submit" value="Aggiorna Piatto">
</form>
@endsection