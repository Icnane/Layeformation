@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>{{ $chapitre->titre }}</h2>

    <p><strong>Description :</strong> {{ $chapitre->description }}</p>

    @if ($chapitre->chemin_video)
        <p><strong>Vidéo :</strong></p>
        <video controls>
            <source src="{{ asset('storage/' . $chapitre->chemin_video) }}" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>
    @endif

    <p><strong>Module :</strong> {{ $chapitre->module->titre }}</p>

    <a href="{{ route('chapitres.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
