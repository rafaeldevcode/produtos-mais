@extends('errors::layout')

@section('code', '404')
@section('message')
    <h2 class="mt-3 text-danger">Página não encontrada!</h2>
    <h3 class="text-danger">Desculpe! Mas não encontramos a página solicitada.</h3>
@endsection
@section('image')
    <img class="col-12 col-lg-6" src="{{ asset('images/404.png') }}" alt="Página não encontrada">
@endsection
