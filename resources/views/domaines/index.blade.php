@extends('layouts.layout')

@section('content')

<div class="card">
    <div class="card-header">Liste des Domaines</div>

    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="{{ route('domaines.create') }}">Créer un nouveau domaine</a>
        </div>

        <!-- Barre de recherche -->
        <form action="{{ route('domaines.index') }}" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un domaine" value="{{ request()->query('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    @if($noResults)
        <div class="alert alert-warning">Aucun domaine ne correspond à votre recherche.</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Logo</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($domaines as $domaine)
            <tr>
                <td>{{ $domaine->id }}</td>
                <td>{{ $domaine->nom }}</td>
                <td><img src="{{ asset('storage/' . $domaine->logo) }}" alt="{{ $domaine->nom }}" style="height: 50px; margin-right: 10px;"></td>
                <td>
                    <form action="{{ route('domaines.destroy', $domaine->id) }}" method="POST" style="display:inline;">
                        <a class="btn b1" href="{{ route('domaines.show', $domaine->id) }}">Afficher</a>
                        <a class="btn b2" href="{{ route('domaines.edit', $domaine->id) }}">Modifier</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Aucun domaine trouvé.</td>
            </tr>
        @endforelse

        </tbody>
    </table>

    <!-- Pagination -->
    {{ $domaines->links() }}
</div>

@endsection
