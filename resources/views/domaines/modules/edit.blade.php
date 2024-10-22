@extends('layouts.layout')

@extends('layouts.app')

@section('content')
    <h1>Éditer le module</h1>
    <form action="{{ route('modules.update', $module->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Titre:</label>
            <input type="text" name="titre" class="form-control" value="{{ $module->titre }}" required>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" required>{{ $module->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Lien de la vidéo (YouTube):</label>
            <input type="url" name="lien_video" class="form-control" value="{{ $module->lien_video }}">
        </div>
        <div class="mb-3">
            <label>Téléverser une vidéo:</label>
            <input type="file" name="chemin_video" class="form-control" accept="video/*">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection