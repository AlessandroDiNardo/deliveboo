@extends('layouts.app')

@php
    $visible = array('true' => 'Disponibile', 'false' => 'Non Disponibile',)
@endphp

@section('content')
<h1>CREA UN NUOVO PIATTO</h1>
<form method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data">
    @csrf

    <label for="name">Nome</label>
    <input type="text" name="name"> <h1>CREA UN NUOVO PIATTO</h1>
<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
    <option value="true" selected>Disponibile</option>
    <option value="false">Non Disponibile</option>
    </select>
    <br>

    <input type="submit" value="CREA UN NUOVO PIATTO">
</form>
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
        @foreach ($visible as $key => $value)
        {{-- <option value="{{ $day }}" {{ $restaurant -> closing_day == $day ? 'selected' : '' }}>{{ $giorno }}</option>
        @endforeach --}}
            
       
    <option value="{{ $key }}" selected>Disponibile</option>
    <option value="false">Non Disponibile</option>
    @endforeach
    </select>
    <br>

    <input type="submit" value="CREA UN NUOVO PIATTO">
</form>
@endsection