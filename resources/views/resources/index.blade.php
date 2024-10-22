@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Ressources</div>

    <a class="btn btn-success" href="{{ route('resources.create') }}">Ajouter une ressource</a>

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Module</th>
                <th>Chapitre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($resources as $resource)
    <tr>
        <td>{{ $resource->title }}</td>
        <td>{{ $resource->module->nom }}</td>
        <td>{{ $resource->chapitre->titre }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('resources.show', $resource->id) }}">Afficher</a>
            <a class="btn btn-warning" href="{{ route('resources.edit', $resource->id) }}">Modifier</a>
            <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4">Aucune ressource trouvée.</td>
    </tr>
@endforelse

        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        
    </div>
</div>
@endsection
