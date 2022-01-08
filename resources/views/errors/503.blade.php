@extends('errors::layout')

@section('code', '503')
@section('message')
    <h2 class="mt-3 text-danger">Serviço indisponível!</h2>
    <h3 class="text-warning">Desculpe! Mas o servidor está em manutenção ou ficou sobrecarregado.</h3>
@endsection
@section('image')
    <img class="col-12 col-lg-6" src="{{ asset('images/503.png') }}" alt="Erro de resposta do servidor">
@endsection