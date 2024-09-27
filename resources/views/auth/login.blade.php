@extends('layouts.app')

@section('content')
<style>
    .form-background {
        position: absolute;
        background-image: url('{{ asset('assets/images/WhatsApp_Image_2024-07-05_à_11.11.09_7c7222e6-removebg-preview.png') }}');
        background-size: cover;
        background-position: center;
        filter: blur(5px);
        opacity: 0.3;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0;
    }

    .card {
        position: relative;
        z-index: 1;
        background-color: transparent; /* Enlever l'arrière-plan de la carte */
    }

    .card-header, .card-body {
        background-color: rgba(255, 255, 255, 0.8); /* Fond semi-transparent pour la lisibilité */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 position-relative">
            <div class="form-background"></div> <!-- Image de fond floue -->
            <div class="card">
                <div class="card-header text-center">
                    <span style="color: black;">LAY</span><span style="color: red;">FORMATION</span>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
