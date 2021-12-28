{{-- @extends('marca/layouts/painel/layout')

@section('conteudo') --}}

    <section class="col-12 col-lg-5 m-auto py-4">
        <div class="bg-light rounded p-5 shedow">
            <div class="d-flex justify-content-center m-auto pb-3" name="logo">
                <i class="fas fa-user-circle display-1"></i>
            </div>

            <x-jet-validation-errors class="mb-4 alert alert-danger" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" class="form-label" />
                    <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Senha') }}" class="form-label"/>
                    <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Lembre-me') }}</span>
                    </label>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4 btn btn-primary">
                        {{ __('Entrar') }}
                        <i class="fas fa-sign-in-alt"></i>
                    </x-jet-button>
                </div>
            </form>
        </div>
    </section>

{{-- @endsection --}}