@extends('layouts.layout')

@section('title', $domaine->nom)

@section('content')
    <h1>Détails du Domaine: {{ $domaine->nom }}</h1>

    <!-- Informations sur le domaine -->
    <div class="card">
        <div class="card-header">
            Informations sur le Domaine
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $domaine->id }}</p>
            <p><strong>Nom:</strong> {{ $domaine->nom }}</p>
            <p><strong>Logo:</strong></p>
            @if ($domaine->logo)
                <img src="{{ asset('storage/' . $domaine->logo) }}" alt="Logo" style="max-width: 150px;">
            @else
                Pas de logo disponible.
            @endif
            <p><strong>Formations associées:</strong></p>
            <ul>
                @foreach($domaine->formations as $formation)
                    <li>
                        <a href="{{ route('formations.show', $formation->id) }}">{{ $formation->nom }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Boutons d'action -->
    <div class="mt-4">
        <a href="{{ route('domaines.edit', $domaine->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('domaines.destroy', $domaine->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        <a href="{{ route('domaines.index') }}" class="btn btn-secondary">Retour à la Liste des Domaines</a>
    </div>
@endsection
