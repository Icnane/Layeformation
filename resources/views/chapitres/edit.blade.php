@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Éditer le Chapitre : {{ $chapitre->titre }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chapitres.update', $chapitre->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $chapitre->titre }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $chapitre->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="module_id">Module</label>
            <select class="form-control" id="module_id" name="module_id" required>
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}" {{ $chapitre->module_id == $module->id ? 'selected' : '' }}>
                        {{ $module->titre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="chemin_video">Vidéo</label>
            <input type="file" class="form-control" id="chemin_video" name="chemin_video" accept="video/*">
            @if ($chapitre->chemin_video)
                <p>Vidéo actuelle : <a href="{{ asset('storage/' . $chapitre->chemin_video) }}" target="_blank">Voir Vidéo</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour Chapitre</button>
    </form>
</div>
@endsection
