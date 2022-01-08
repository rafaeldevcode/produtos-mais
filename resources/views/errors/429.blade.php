@extends('errors::layout')

@section('code', '429')
@section('message')
    <h2 class="mt-3 text-danger">Muitas solicitções!</h2>
    <h3 class="text-danger">Desculpe! Mas não foi possivel atenteder seu pedido, muitas solicitções.</h3>
@endsection
@section('image')
    <img class="col-12 col-lg-6" src="{{ asset('images/429.png') }}" alt="Muitas solicitações">
@endsection