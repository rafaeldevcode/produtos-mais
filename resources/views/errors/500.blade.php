@extends('errors::layout')

@section('code', '500')
@section('message')
    <h2 class="mt-3 text-danger">Erro de resposta do servidor!</h2>
    <h3 class="text-warning">Desculpe! Mas mas encontramos uma condição inesperada, o que impediu de atender à solicitação.</h3>
@endsection
@section('image')
    <img class="col-12 col-lg-6" src="{{ asset('images/500.png') }}" alt="Erro de resposta do servidor">
@endsection