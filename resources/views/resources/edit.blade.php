@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Modifier la ressource : {{ $resource->title }}</div>

    <div class="card-body">
        <form action="{{ route('resources.update', $resource->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $resource->title) }}" placeholder="Titre de la ressource">
            </div>

            <div class="form-group">
                <label for="text_content">Texte</label>
                <textarea name="text_content" class="form-control" rows="5" placeholder="Contenu texte">{{ old('text_content', $resource->text_content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="video">Vidéo (téléchargez une nouvelle vidéo si vous souhaitez la remplacer)</label>
                <input type="file" name="video" class="form-control">
                @if($resource->video_path)
                    <p>Vidéo actuelle : <a href="{{ asset('storage/' . $resource->video_path) }}" target="_blank">Voir la vidéo</a></p>
                @endif
            </div>

            <div class="form-group">
                <label for="module_id">Module</label>
                <select name="module_id" class="form-control">
                    @foreach ($modules as $module)
                    <option value="{{ $module->id }}" {{ $resource->module_id == $module->id ? 'selected' : '' }}>
                        {{ $module->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="chapitre_id">Chapitre</label>
                <select name="chapitre_id" class="form-control">
                    @foreach ($chapitres as $chapitre)
                    <option value="{{ $chapitre->id }}" {{ $resource->chapitre_id == $chapitre->id ? 'selected' : '' }}>
                        {{ $chapitre->titre }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
