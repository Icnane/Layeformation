@extends('layouts.layout')

@section('content')
<h1>Ajouter un module</h1>

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

<form action="{{ route('modules.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Titre:</label>
        <input type="text" name="titre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description:</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Lien de la vidéo (YouTube):</label>
        <input type="url" name="lien_video" class="form-control" value="{{ old('lien_video') }}">
    </div>
    <div class="mb-3">
        <label>Téléverser une vidéo:</label>
        <input type="file" name="chemin_video" class="form-control" accept="video/*">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection
