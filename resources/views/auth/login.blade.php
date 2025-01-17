@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
    <div class="row justify-content-center align-items-center min-vh-100 px-4">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <!-- Card with enhanced shadow and styling -->
            <div class="card border-0 shadow-lg" style="border-radius: 1rem;">
                <!-- Card Header with Icon -->
                <div class="card-header bg-transparent border-0 text-center pt-4 pb-3">
                    <div class="mb-3">
                        <i class="fas fa-user-circle text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="text-primary fw-bold text-uppercase mb-0">{{ __('Connexion') }}</h4>
                </div>

                <div class="card-body px-4 py-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label text-muted small fw-bold">
                                {{ __('Email') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" type="email" 
                                    class="form-control form-control-lg border-start-0 ps-0 @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email" 
                                    autofocus
                                    placeholder="Entrez votre email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label text-muted small fw-bold">
                                {{ __('Mot de passe') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" 
                                    type="password" 
                                    class="form-control form-control-lg border-start-0 ps-0 @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required 
                                    autocomplete="current-password"
                                    placeholder="Entrez votre mot de passe">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="row mb-4 align-items-center">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label small" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col text-end">
                                @if (Route::has('password.request'))
                                    <a class="text-primary text-decoration-none small" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                <i class="fas fa-sign-in-alt me-2"></i>{{ __('Se connecter') }}
                            </button>
                        </div>
                    </form>

                    <!-- Register Link -->
                    <div class="text-center mt-4">
                        <p class="text-muted mb-0 small">
                            {{ __('Pas encore de compte ?') }}
                            <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">
                                {{ __('S\'inscrire') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Enhanced input styling */
    .form-control {
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        transition: all 0.2s ease-in-out;
    }

    .input-group {
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    .input-group-text {
        border: 1px solid #dee2e6;
        padding: 0.75rem 1rem;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        border-color: #86b7fe;
    }

    /* Button styling */
    .btn-primary {
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    /* Card enhancements */
    .card {
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
    }

    /* Link styling */
    a {
        transition: all 0.2s ease;
    }

    a:hover {
        opacity: 0.8;
    }
</style>
@endsection