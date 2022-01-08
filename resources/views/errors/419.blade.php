@extends('errors::layout')

@section('code', '419')
@section('message')
    <h2 class="mt-3 text-danger">Página expirada!</h2>
    <h3 class="text-danger">Desculpe! Mas essa página expirou.</h3>
@endsection
@section('image')
    <img class="col-12 col-lg-6" src="{{ asset('images/419.png') }}" alt="Página expirada">
@endsection