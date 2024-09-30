@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Créer un Nouveau Domaine</div>

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

    <form action="{{ route('domaines.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
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
            <label for="logo">Logo :</label>
            <input type="file" name="logo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>

</div>
@endsection
