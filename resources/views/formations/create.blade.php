@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Créer une Nouvelle Formation</div>

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

    <form action="{{ route('formations.store') }}" method="POST" class="form-container">
        @csrf
        <div class="form-group">
            <label for="id">ID :</label>
            <input type="number" name="id" class="form-control" value="{{ old('id') }}" required>
        </div>
        <div class="form-group">
            <label for="promo">Promo :</label>
            <input type="text" name="promo" class="form-control" value="{{ old('promo') }}">
        </div>
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="cout">Coût :</label>
            <input type="number" name="cout" class="form-control" value="{{ old('cout') }}" required>
        </div>
        <div class="form-group">
            <label for="heures_par_semaine">Heures par semaine :</label>
            <input type="number" name="heures_par_semaine" class="form-control" value="{{ old('heures_par_semaine') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
</div>
@endsection
