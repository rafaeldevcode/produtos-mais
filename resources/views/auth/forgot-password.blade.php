@extends('layouts/painel/layout')

@section('conteudo')

    <section class="col-12 col-lg-5 m-auto py-4">
        <div class="bg-light rounded p-5 shedow">
            <div class="d-flex justify-content-center m-auto pb-3" name="logo">
                <i class="fas fa-unlock display-1"></i>
            </div>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4 alert alert-danger" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" class="form-label" />
                    <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="d-flex align-items-center justify-content-center mt-4">
                    <x-jet-button class="ml-4 btn btn-secondary">
                        {{ __('Link de redefinição de senha de e-mail') }}
                        <i class="fas fa-key"></i>
                    </x-jet-button>
                </div>
            </form>
        </div>
    </section>

@endsection