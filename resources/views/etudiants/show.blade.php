@extends('layouts.layout')

@section('content')
<div class="card3">
    <div class="card-header">Détails de l'Étudiant</div>

    <div class="etudiant-details">
        <div class="detail-group">
            <label>ID :</label>
            <span>{{ $etudiant->id }}</span>
        </div>
        <div class="detail-group">
            <label>Nom :</label>
            <span>{{ $etudiant->nom }}</span>
        </div>
        <div class="detail-group">
            <label>Prénom :</label>
            <span>{{ $etudiant->prenom }}</span>
        </div>
        <div class="detail-group">
            <label>Email :</label>
            <span>{{ $etudiant->email }}</span>
        </div>
        <div class="detail-group">
            <label>Téléphone :</label>
            <span>{{ $etudiant->tel }}</span>
        </div>
        <div class="detail-group">
            <label>Sexe :</label>
            <span>{{ $etudiant->sexe }}</span>
        </div>
        <div class="detail-group">
            <label>Âge :</label>
            <span>{{ $etudiant->age }}</span>
        </div>
        <div class="detail-group">
            <label>Formation :</label>
            <span>{{ $etudiant->formation }}</span>
        </div>
        <div class="detail-group">
            <label>Mode :</label>
            <span>{{ $etudiant->mode }}</span>
        </div>
        <div class="detail-group">
            <label>Ville :</label>
            <span>{{ $etudiant->ville }}</span>
        </div>

        <!-- Bouton de retour -->
        <div class="bouton1">
            <div class="return-button">
                <a class="btn btn-secondary" href="{{ route('etudiants.index') }}">Retour à la liste</a>
            </div>

            <div class="action-buttons">
                <a class="btn5 btn-success1" href="{{ route('etudiants.edit', $etudiant->id) }}">Modifier</a>

                <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn6 btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
