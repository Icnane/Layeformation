@extends('layouts.layout')

@section('content')
<div class="card3">
    <div class="card-header">Détails du Formateur</div>

    <div class="formateur-details">
        <div class="detail-group">
            <label>ID :</label>
            <span>{{ $formateur->id }}</span>
        </div>
        <div class="detail-group">
            <label>Nom :</label>
            <span>{{ $formateur->nom }}</span>
        </div>
        <div class="detail-group">
            <label>Prénom :</label>
            <span>{{ $formateur->prenom }}</span>
        </div>
        <div class="detail-group">
            <label>Email :</label>
            <span>{{ $formateur->email }}</span>
        </div>
        <div class="detail-group">
            <label>Contact :</label>
            <span>{{ $formateur->contact }}</span>
        </div>

        <!-- Bouton de retour -->
        <div class="bouton1">
            <div class="return-button">
                <a class="btn btn-secondary" href="{{ route('formateurs.index') }}">Retour à la liste</a>
            </div>

            <div class="action-buttons">
                <a class="btn5 btn-success1" href="{{ route('formateurs.edit', $formateur->id) }}">Modifier</a>

                <form action="{{ route('formateurs.destroy', $formateur->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn6 btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
