@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Modifier le Domaine</div>

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

    <form action="{{ route('domaines.update', $domaine->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT') <!-- Indique que c'est une mise à jour -->

        <div class="form-group">
            <label for="id">ID :</label>
            <input type="number" name="id" class="form-control" value="{{ $domaine->id }}" required readonly>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $domaine->nom) }}" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo :</label>
            <input type="file" name="logo" class="form-control">
            <small>Logo actuel : <img src="{{ asset('storage/' . $domaine->logo) }}" alt="{{ $domaine->nom }}" style="height: 50px;"></small>
        </div>

        <button type="submit" class="btn btn-success">Mettre à Jour</button>
    </form>
</div>
@endsection
