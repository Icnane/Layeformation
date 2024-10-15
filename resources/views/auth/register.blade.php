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
        border: 2px solid lightcoral; /* Contour rouge clair autour de la carte */
        border-radius: 10px; /* Coins arrondis */
    }

    .card-header, .card-body {
        background-color: rgba(255, 255, 255, 0.8); /* Fond semi-transparent pour la lisibilité */
    }

    .form-control {
        width: 100%; /* Remplir toute la largeur de la colonne */
        padding: 12px; /* Ajouter un peu de rembourrage */
        border: 2px solid lightcoral; /* Contour rouge clair pour les champs */
        border-radius: 5px; /* Coins arrondis pour les champs */
    }

    .form-control:focus {
        border-color: red; /* Couleur de contour lors du focus */
        box-shadow: 0 0 5px rgba(255, 0, 0, 0.5); /* Ombre lors du focus */
    }

    .button-container {
        margin-top: 20px; /* Espacement en haut des boutons */
    }

    .image-container {
        margin-top: 20px;
        text-align: center;
    }

    .image-container img {
        width: 100%; /* Ajuster la largeur de l'image */
        max-width: 300px; /* Limiter la largeur maximale */
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
                    <div class="form-container">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="button-container">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
