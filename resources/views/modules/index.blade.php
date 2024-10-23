@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Modules</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="{{ route('modules.create') }}">Créer un nouveau module</a>
        </div>

        <!-- Barre de recherche -->
        <form action="{{ route('modules.index') }}" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un module" value="{{ request()->query('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    @if($noResults)
        <div class="alert alert-warning">Aucun module ne correspond à votre recherche.</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Formation</th>
                <th width="250px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($modules as $module)
                <tr>
                    <td>{{ $module->id }}</td>
                    <td>{{ $module->titre }}</td>
                    <td>{{ $module->description ?? 'Aucune description' }}</td>
                    <td>{{ $module->formation->nom }}</td>
                    <td>
                        <form action="{{ route('modules.destroy', $module->id) }}" method="POST" class="action-form boutonms">
                            <a class="btn b1" href="{{ route('modules.show', $module->id) }}">
                                Afficher
                            </a>

                            <a class="btn b2" href="{{ route('modules.edit', $module->id) }}">
                                Modifier
                            </a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn b3">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Aucun module disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $modules->links() }}
    </div>
</div>
@endsection
