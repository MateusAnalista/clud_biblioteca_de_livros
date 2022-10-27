@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 bt">
                <h2 class="text-center">Livros Plano Gratis</h2>
            </div>
            <div class="col-md-12">
                <div class="page-content">
                    {{-- {{ dd($livrosFree) }} --}}
                    @forelse ($livrosFree as $free)
                        <div class="card" style="background-image: url('/img/livros/{{ $free->imagem }}')">
                            <div class="content">
                                <h2 class="title">{{ $free->titulo }}</h2>
                                @guest
                                    <a href="{{ route('login') }}" class="btn black">Entre para ver</a>
                                @endguest
                                @auth
                                    <a href="{{ route('home.livro', [$free->id]) }}" class="btn black">Ver Livro</a>
                                @endauth
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Desculpe não temos livros disponiveis neste momento</p>
                    @endforelse
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Livros Plano Premium</h2>
            </div>
            <div class="col-md-12">
                <div class="page-content">
                    {{-- {{ dd($livrosFree) }} --}}
                    @forelse ($livrosPremium as $premium)
                        <div class="card" style="background-image: url('/img/livros/{{ $premium->imagem }}')">
                            <div class="content">
                                <h2 class="title">{{ $premium->titulo }}</h2>
                                @guest
                                    <a href="{{ route('login') }}" class="btn black">Entre para ver</a>
                                @endguest
                                @auth
                                    @if(Auth::user()->role === 'premium' ||  Auth::user()->role === 'master')
                                        <a href="{{ route('home.livro', [$free->id]) }}" class="btn black">Ver livro</a>
                                    @else
                                        <a href="{{ route('home.planos') }}" class="btn black">Ver planos</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Desculpe não temos livros disponiveis neste momento</p>
                    @endforelse
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Livros Plano Master</h2>
            </div>
            <div class="col-md-12">
                <div class="page-content">
                    {{-- {{ dd($livrosFree) }} --}}
                    @forelse ($livrosMaster as $master)
                        <div class="card" style="background-image: url('/img/livros/{{ $master->imagem }}')">
                            <div class="content">
                                <h2 class="title">{{ $master->titulo }}</h2>
                                @guest
                                    <a href="{{ route('login') }}" class="btn black">Entre para ver</a>
                                @endguest
                                @auth
                                    @if(Auth::user()->role === 'master')
                                        <a href="{{ route('home.livro', [$free->id]) }}" class="btn black">Ver livro</a>
                                    @else
                                        <a href="{{ route('home.planos') }}" class="btn black">Ver planos</a>
                                    @endif
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
