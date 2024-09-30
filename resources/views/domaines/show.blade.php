@extends('layouts.layout')

@section('title', $formation->nom)

@section('content')
    <h1>Détails de la Formation: {{ $formation->nom }}</h1>

    <!-- Informations sur la formation -->
    <div class="card">
        <div class="card-header">
            Informations sur la Formation
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $formation->id }}</p>
            <p><strong>Promotion:</strong> {{ $formation->promo }}</p>
            <p><strong>Description:</strong> {{ $formation->description }}</p>
            <p><strong>Coût:</strong> {{ $formation->cout }} €</p>
            <p><strong>Heures par semaine:</strong> {{ $formation->heures_par_semaine }}</p>
            <p><strong>Domaine:</strong>
                @if($formation->domaine) <!-- Assurez-vous que la relation domaine est définie -->
                    <a href="{{ route('domaines.show', $formation->domaine->id) }}">{{ $formation->domaine->nom }}</a>
                @else
                    Aucune association de domaine
                @endif
            </p>
        </div>
    </div>

    <!-- Boutons d'action -->
    <div class="mt-4">
        <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        <a href="{{ route('formations.index') }}" class="btn btn-secondary">Retour à la Liste des Formations</a>
    </div>
@endsection
