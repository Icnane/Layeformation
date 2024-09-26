@extends('layouts.layout')

@section('content')
<div class="card3">
    <div class="card-header">Détails de la Formation</div>

    <div class="formation-details">
        <div class="detail-group">
            <label>ID :</label>
            <span>{{ $formation->id }}</span>
        </div>

        <div class="detail-group">
            <label>Promo :</label>
            <span>{{ $formation->promo }}</span>
        </div>

        <div class="detail-group">
            <label>Nom :</label>
            <span>{{ $formation->nom }}</span>
        </div>

        <div class="detail-group">
            <label>Description :</label>
            <span>{{ $formation->description }}</span>
        </div>

        <div class="detail-group">
            <label>Coût :</label>
            <span>{{ $formation->cout }} €</span>
        </div>

        <div class="detail-group">
            <label>Heures par semaine :</label>
            <span>{{ $formation->heures_par_semaine }} heures</span>
        </div>

        <!-- Bouton de retour -->
        <div class="bouton1">

            <div class="return-button">
                <a class="btn btn-secondary" href="{{ route('formations.index') }}">Retour à la liste</a>
            </div>

            <div class="action-buttons">
                <a class="btn5 btn-success1" href="{{ route('formations.edit', $formation->id) }}">Modifier</a>

                <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn6 btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
