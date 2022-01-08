@extends('errors::layout')

@section('code', '403')
@section('message')
    <h2 class="mt-3 text-danger">Acesso negado!</h2>
    <h3 class="text-danger">Desculpe! Entendemos o seu pedido, mas não podemos outoriza-lo.</h3>
@endsection
@section('image')
    <img class="col-12 col-lg-6" src="{{ asset('images/403.png') }}" alt="Página não autorizada">
@endsection