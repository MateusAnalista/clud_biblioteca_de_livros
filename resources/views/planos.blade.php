@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row gutters">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="plan-card plan-one">
                    <div class="pricing-header">
                        <h4 class="plan-title">Plano Gratis</h4>
                        <div class="plan-cost">R$0</div>
                    </div>
                    <ul class="plan-features">
                        <li>Livro ilimitados</li>
                        <li>disponiveis em todo o tempo</li>
                        <li class="text-muted"><del>Livros atualizados</del></li>
                        <li class="text-muted"><del>Ebook Baixavel</del></li>
                        <li class="text-muted"><del>Audiobooks disponiveis<del></li>
                        <li class="text-muted"><del>Livros autografados</del></li>
                    </ul>
                    <div class="plan-footer">
                        @if (Auth::user()->role == 'free')
                            <buttom type="buttom" class="btn text-bg-light btn-lg btn-rounded">Plano atual</buttom>
                        @else
                            <a href="{{ route('home.mudar.plano', ['free']) }}" class="btn btn-info btn-lg btn-rounded">Quero este plano</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="plan-card plan-one">
                    <div class="pricing-header orange">
                        <h4 class="plan-title">Plano Premium</h4>
                        <div class="plan-cost">R$50.00</div>
                    </div>
                    <ul class="plan-features">
                        <li>Livro ilimitados</li>
                        <li>disponiveis em todo o tempo</li>
                        <li>Livros atualizados</li>
                        <li>Ebook Baixavel</li>
                        <li class="text-muted"><del>Audiobooks disponiveis<del></li>
                        <li class="text-muted"><del>Livros autografados</del></li>
                    </ul>
                    <div class="plan-footer">
                        @if (Auth::user()->role == 'premium')
                            <buttom type="buttom" class="btn text-bg-light btn-lg btn-rounded">Plano atual</buttom>
                        @else
                            <a href="{{ route('home.mudar.plano', ['premium']) }}" class="btn btn-info btn-lg btn-rounded">Quero este plano</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="plan-card plan-one">
                    <div class="pricing-header green">
                        <h4 class="plan-title">Plano Master</h4>
                        <div class="plan-cost">R$200.00</div>
                    </div>
                    <ul class="plan-features">
                        <li>Livro ilimitados</li>
                        <li>disponiveis em todo o tempo</li>
                        <li>Livros atualizados</li>
                        <li>Ebook Baixavel</li>
                        <li>Audiobooks disponiveis</li>
                        <li>Livros autografados</li>
                    </ul>
                    <div class="plan-footer">
                        @if (Auth::user()->role == 'master')
                            <buttom type="buttom" class="btn text-bg-light btn-lg btn-rounded">Plano atual</buttom>
                        @else
                            <a href="{{ route('home.mudar.plano', ['master']) }}" class="btn btn-info btn-lg btn-rounded">Quero este plano</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
