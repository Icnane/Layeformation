@extends('layouts.layout')

@section('content')
<div class="card3">
    <div class="card-header">Détails du Module</div>

    <div class="module-details">
        <div class="detail-group">
            <label>ID :</label>
            <span>{{ $module->id }}</span>
        </div>
        <div class="detail-group">
            <label>Titre :</label>
            <span>{{ $module->titre }}</span>
        </div>
        <div class="detail-group">
            <label>Description :</label>
            <span>{{ $module->description }}</span>
        </div>
        <div class="detail-group">
            <label>Formation :</label>
            <span>{{ $module->formation->nom }}</span>
        </div>

        <div class="bouton1">
            <div class="return-button">
                <a class="btn btn-secondary" href="{{ route('modules.index') }}">Retour à la liste</a>
            </div>

            <div class="action-buttons">
                <a class="btn5 btn-success1" href="{{ route('modules.edit', $module->id) }}">Modifier</a>

                <form action="{{ route('modules.destroy', $module->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn6 btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
