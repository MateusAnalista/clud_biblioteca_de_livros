@extends('layouts.app')

@section('content')
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/img/livros/{{$livro->imagem}}"
                    alt="..."></div>
            <div class="col-md-6">
                <div class="small mb-1">Genero: {{ $livro->genero->titulo }}</div>
                <h1 class="display-5 fw-bolder">{{ $livro->titulo }}</h1>
                <div class="fs-5 mb-5">
                    <span>Editora: {{ $livro->editora }}</span>
                </div>
                <p>{{ $livro->descricao }}</p>
                <div class="d-flex">
                    <a href="{{ route('home.reservar', [$livro->id]) }}" class="btn btn-outline-dark flex-shrink-0">
                        <i class="bi-cart-fill me-1"></i>
                        Fazer Reserva
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
