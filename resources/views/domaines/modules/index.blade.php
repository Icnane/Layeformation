@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Modules</h1>
    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Ajouter un Nouveau Module</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Vidéo</th>
                <th>Formation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
            <tr>
                <td>{{ $module->title }}</td>
                <td>{{ $module->description }}</td>
                <td><a href="{{ $module->video_url }}" target="_blank">Voir Vidéo</a></td>
                <td>{{ $module->formation->name }}</td>
                <td>
                    <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
