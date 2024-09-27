@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Cours les plus populaires</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="{{ route('formations.create') }}">Créer un nouvel étudiant</a>
        </div>

        <!-- Barre de recherche -->
        <form action="{{ route('formations.index') }}" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un étudiant" value="{{ request()->query('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
    @if($noResults)
        <div class="alert alert-warning">Aucune formation ne correspond à votre recherche.</div>
    @endif
    <table>
        <thead>
            <tr>

                <th>ID</th>
                <th>Promo</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Coût</th>
                <th width= '300px'>Heures par semaine</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($formations as $formation)
            <tr>
                <td>{{ $formation->id }}</td>
                <td>{{ $formation->promo }}</td>
                <td>{{ $formation->nom }}</td>
                <td>{{ $formation->description }}</td>
                <td>{{ $formation->cout }} €</td>
                <td>{{ $formation->heures_par_semaine }} heures</td>
                <td>
                    <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="action-form">
                        <a class="btn b1" href="{{ route('formations.show', $formation->id) }}">
                            Afficher
                        </a>

                        <a class="btn b2" href="{{ route('formations.edit', $formation->id) }}">
                            Modifier
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn b3">
                            Supprimer
                        </button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Aucune formation disponible.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $formations->links() }}
    </div>
</div>
</div>
@endsection
