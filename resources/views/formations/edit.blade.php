@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Modifier la Formation</div>

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('formations.update', $formation->id) }}" method="POST" class="form-container">
        @csrf
        @method('PUT') <!-- Indique que c'est une mise à jour -->

        <div class="form-group">
            <label for="id">ID :</label>
            <input type="number" name="id" class="form-control" value="{{ $formation->id }}" required readonly>
        </div>

        <div class="form-group">
            <label for="promo">Promo :</label>
            <input type="text" name="promo" class="form-control" value="{{ old('promo', $formation->promo) }}">
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $formation->nom) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" class="form-control" required>{{ old('description', $formation->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="cout">Coût :</label>
            <input type="number" name="cout" class="form-control" value="{{ old('cout', $formation->cout) }}" required>
        </div>

        <div class="form-group">
            <label for="heures_par_semaine">Heures par semaine :</label>
            <input type="number" name="heures_par_semaine" class="form-control" value="{{ old('heures_par_semaine', $formation->heures_par_semaine) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à Jour</button>
    </form>
</div>
</div>
@endsection
