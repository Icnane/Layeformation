@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Module</h1>
    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="video_url" class="form-label">URL de la Vidéo</label>
            <input type="url" class="form-control" id="video_url" name="video_url">
        </div>
        <div class="mb-3">
            <label for="formation_id" class="form-label">Formation</label>
            @if ($formations->isEmpty())
                <div class="alert alert-warning">Aucune formation disponible.</div>
            @else
            <select name="formation_id" required>
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->title }}</option>
                @endforeach
            </select>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
