@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">{{ $resource->title }}</div>

    <div class="card-body">
        @if ($resource->text_content)
            <div class="mb-3">
                <h5>Contenu texte</h5>
                <p>{{ $resource->text_content }}</p>
            </div>
        @endif

        @if ($resource->video_path)
            <div class="mb-3">
                <h5>Vidéo</h5>
                <video width="320" height="240" controls>
                    <source src="{{ asset('storage/' . $resource->video_path) }}" type="video/mp4">
                    Votre navigateur ne supporte pas l'élément vidéo.
                </video>
            </div>
        @endif

        <p><strong>Module :</strong> {{ $resource->module->nom }}</p>
        <p><strong>Chapitre :</strong> {{ $resource->chapitre->titre }}</p>

        <div class="mt-4">
            <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a class="btn btn-secondary" href="{{ route('resources.index') }}">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
