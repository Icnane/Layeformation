@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Modifier le Formateur</div>

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
            <label for="contact">Contact :</label>
            <input type="number" name="contact" class="form-control" value="{{ old('contact', $formateur->contact) }}" required min="0" max="999999999999999">
        </div>

        <button type="submit" class="btn btn-success">Mettre à Jour</button>
    </form>
</div>
@endsection
