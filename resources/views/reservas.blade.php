@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 bt">
                <h2 class="text-center">Livros Plano Gratis</h2>
            </div>
            <div class="col-md-12">
                <div class="page-content">
                    {{-- {{ dd($livrosFree) }} --}}
                    @forelse ($reservas as $reserva)
                        <div class="card" style="background-image: url('/img/livros/{{ $reserva->livro->imagem }}')">
                            <div class="content">
                                <h2 class="title">{{ $reserva->livro->titulo }}</h2>
                                @auth
                                    <a href="{{ route('home.showPdf', [$reserva->livro->id]) }}" class="btn black">Ler</a>
                                    <a href="{{ route('home.devolver', [$reserva->id]) }}" class="btn black">Devolver</a>
                                @endauth
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Desculpe não temos livros disponiveis neste momento</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
