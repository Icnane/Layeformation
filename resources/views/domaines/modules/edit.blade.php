@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Module : {{ $module->title }}</h1>

    <form action="{{ route('modules.update', $module) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $module->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" required>{{ $module->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="video_url" class="form-label">URL de la vidéo</label>
            <input type="url" name="video_url" class="form-control" id="video_url" value="{{ $module->video_url }}">
        </div>

        <div class="mb-3">
            <label for="formation_id" class="form-label">Formation</label>
            <select name="formation_id" class="form-select" id="formation_id" required>
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}" {{ $module->formation_id == $formation->id ? 'selected' : '' }}>
                        {{ $formation->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
