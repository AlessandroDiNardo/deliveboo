@extends('layouts.Products')

@section('content')
<section class="py-5">
    <div class="container">
        
    <div class="d-grid gap-2 d-md-flex d-flex justify-content-start align-items-center pb-5">
        <a class="btn btn-warning w-1 text-start" href="{{ url('profile') }}">
             {{__('Torna al Profilo')}}
        </a>
        <a href="{{ route('product.create') }}" class="btn btn-success w-1 text-center">
            Aggiungi Piatto
        </a>
    </div>

    <div class="container d-flex justify-content-center align-items-center flex-wrap gap-5">
        @foreach ( $restaurant -> products as $product)
        <div class="card-deck d-flex align-items-center justify-content-end gap-3 flex-wrap" >
            <div class="card " style="height:600px; width:300px;">
                <img src="{{ str_contains($product -> img, 'http') ? $product -> img : asset('storage/' . $product -> img) }}" alt="Card image cap" class=" card-img-top" style="height:250px; width:298px;">
                <div class="text-start p-3 text_cont" style="width:100%; height:100%;">
                    <h3 class="card-title category font-weight-bold mt-3">{{ $product -> name }}</h3>
                    <h6 class="text-dark">Prezzo: {{ $product -> price }}</h6>
                    <h5>Ingredienti:</h5>
                    <p class="card-text font-weight-bold mt-2">{{ $product -> ingredients }}</p>
                    <div class="d-flex align-items-center justify-content-center gap-3 btn_cont" style="height:100%">
                        <a href="{{ route('product.edit', $product) }}" class="btn btn-success my-2">
                            Modifica Piatto
                        </a>
                        <button type="button" class="btn btn-danger my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Elimina piatto
                        </button>
        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
        
                                <div class="modal-content">
                                    <div class="modal-header">
        
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cancellazione prodotto!</h1>
        
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
                                    </div>
        
                                    <div class="modal-body">
                                        Questa azione cancellerà per sempre il tuo prodotto.
                                    </div>
        
                                    <div class="modal-footer">
        
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
                                        <a href="{{ route('product.delete', $product) }}" class="text-reset text-decoration-none">
                                            <button type="button" class="btn btn-danger">
                                                Elimina
                                            </button>
                                        </a>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
    </div>

</section>
@endsection