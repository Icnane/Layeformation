@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Créer un Nouveau Formateur</div>

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

    <form action="{{ route('formateurs.store') }}" method="POST" class="form-container">
        @csrf
        <div class="form-group">
            <label for="id">ID :</label>
            <input type="number" name="id" class="form-control" value="{{ old('id') }}" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact :</label>
            <input type="number" name="contact" class="form-control" value="{{ old('contact', $formateur->contact) }}" required min="0" max="999999999999999">
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
