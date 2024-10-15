@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Modifier l'Étudiant</div>

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

    <form action="{{ route('formateurs.update', $formateur->id) }}" method="POST" class="form-container">
        @csrf
        @method('PUT') <!-- Indique que c'est une mise à jour -->

        <div class="form-group">
            <label for="id">ID :</label>
            <input type="number" name="id" class="form-control" value="{{ $formateur->id }}" required readonly>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $formateur->nom) }}" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $formateur->prenom) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $formateur->email) }}" required>
        </div>

        <div class="form-group">
            <label for="tel">Téléphone :</label>
            <input type="text" name="tel" class="form-control" value="{{ old('tel', $formateur->tel) }}" required>
        </div>

        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <select name="sexe" class="form-control" required>
                <option value="homme" {{ old('sexe', $formateur->sexe) == 'homme' ? 'selected' : '' }}>Homme</option>
                <option value="femme" {{ old('sexe', $formateur->sexe) == 'femme' ? 'selected' : '' }}>Femme</option>
            </select>
        </div>

        <div class="form-group">
            <label for="age">Âge :</label>
            <input type="number" name="age" class="form-control" value="{{ old('age', $formateur->age) }}" required>
        </div>

        <div class="form-group">
            <label for="formation">Formation :</label>
            <input type="text" name="formation" class="form-control" value="{{ old('formation', $formateur->formation) }}" required>
        </div>

        <div class="form-group">
            <label for="mode">Mode :</label>
            <select name="mode" class="form-control" required>
                <option value="en-ligne" {{ old('mode', $formateur->mode) == 'en-ligne' ? 'selected' : '' }}>En ligne</option>
                <option value="presentiel" {{ old('mode', $formateur->mode) == 'presentiel' ? 'selected' : '' }}>Présentiel</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" name="ville" class="form-control" value="{{ old('ville', $formateur->ville) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à Jour</button>
    </form>
</div>
@endsection
