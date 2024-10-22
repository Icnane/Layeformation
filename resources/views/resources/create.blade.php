@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Ajouter une nouvelle ressource</div>

    <div class="card-body">
        <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" placeholder="Titre de la ressource">
            </div>

            <div class="form-group">
                <label for="text_content">Texte</label>
                <textarea name="text_content" class="form-control" rows="5" placeholder="Contenu texte"></textarea>
            </div>

            <div class="form-group">
                <label for="video">Vidéo</label>
                <input type="file" name="video" class="form-control">
            </div>

            <div class="form-group">
                <label for="module_id">Module</label>
                <select name="module_id" class="form-control">
                    @foreach ($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="chapitre_id">Chapitre</label>
                <select name="chapitre_id" class="form-control">
                    @foreach ($chapitres as $chapitre)
                    <option value="{{ $chapitre->id }}">{{ $chapitre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection
