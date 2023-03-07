@extends('layouts.app')

@section('content')
<h1>CREATE NEW RESTAURANT</h1>
<form method="POST" action="{{ route('restaurant.store') }}">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name">
    <br>

    <label for="description">Description</label>
    <input type="text" name="description">
    <br>

    <label for="place">Place</label>
    <input type="text" name="place">
    <br>

    <label for="phone_number">Phone Number</label>
    <input type="text" name="phone_number">
    <br>

    <label for="img">Img</label>
    <input type="text" name="img">
    <br>

    <label for="vat">Piva</label>
    <input type="text" name="vat">
    <br>

    <label for="opening_time">Opening Time</label>
    <input type="time" name="opening_time">
    <br>

    <label for="closing_time">Closing Time</label>
    <input type="time" name="closing_time">
    <br>

    <label for="shipping_cost">Shipping Cost</label>
    <input type="number" step="0.01" min="0" name="shipping_cost">
    <br>

    <label for="closing_day">Closing Day</label>
    <input type="text" name="closing_day">
    <br>

    <label>Categories</label>
    <br>
    @foreach ($categories as $category)
        <input type="checkbox" name="category_id[]" value="{{ $category -> id }}" id="{{ $category -> id }}">
        <label for="{{ $category -> id }}">{{ $category -> name }}</label>
        <br>
    @endforeach
    <input type="submit" value="CREATE NEW RESTAURANT">
</form>
@endsection