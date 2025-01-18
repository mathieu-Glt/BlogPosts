@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Créer un compte') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- firstname -->
                        <div class="mb-3">
                            <label for="firstname" class="form-label">{{ __('Prénom') }}</label>
                            <input id="firstname" type="text" name="firstname" placeholder="firstname"
                                class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                            @error('firstname')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- lastname -->
                        <div class="mb-3">
                            <label for="lastname" class="form-label">{{ __('Nom') }}</label>
                            <input id="lastname" type="text" name="lastname" placeholder="lastname"
                                class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                value="{{ old('lastname') }}" required autocomplete="lastname">
                            @error('lastname')
                                <div class="invalid-feedback">
                                </div>
                            @enderror
                        </div>

                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nom') }}</label>
                            <input id="name" type="text" name="name" placeholder="name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">
                                </div>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('Téléphone') }}</label>
                            <input id="phone" type="tel" name="phone" placeholder="0112103246"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" autocomplete="tel">
                            @error('phone')
                                <div class="invalid-feedback">
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" name="email" placeholder="test@test.com"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password" name="password" placeholder="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Confirmer le mot de passe -->
                        <div class="mb-3">
                            <label for="password-confirm"
                                class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                            <input id="password-confirm" placeholder="password-confirm" type="password-confirm"
                                class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('S\'inscrire') }}
                            </button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection