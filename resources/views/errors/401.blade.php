@extends('errors::layout')

@section('code', '401')
@section('message')
    <h2 class="mt-3 text-danger">Sem autorização para acessar esta página!</h2>
    <h3 class="text-danger">Desculpe! Mas não encontramos credenciais de autenticação válidas para o recurso solicitado.</h3>
@endsection
@section('image')
    <img class="col-12 col-lg-6" src="{{ asset('images/401.png') }}" alt="Página não autorizada">
@endsection