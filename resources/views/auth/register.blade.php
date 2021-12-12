@extends('marca/layouts/painel/layout')

@section('conteudo')

    <section class="col-12 col-lg-5 m-auto py-4">
        <div class="bg-light rounded p-5 shedow">
            <div class="d-flex justify-content-center m-auto pb-3" name="logo">
                <i class="fas fa-user-plus display-1"></i>
            </div>

            <x-jet-validation-errors class="mb-4 alert alert-danger" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Nome') }}" class="form-label" />
                    <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" class="form-label" />
                    <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Senha') }}" class="form-label" />
                    <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" class="form-label" />
                    <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="d-flex align-items-center justify-content-between mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Jé está cadastrado?') }}
                    </a>

                    <x-jet-button class="ml-4 btn btn-primary">
                        {{ __('Registrar') }}
                        <i class="fas fa-user-plus"></i>
                    </x-jet-button>
                </div>
            </form>
        </div>
    </section>

@endsection