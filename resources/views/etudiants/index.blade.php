@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Étudiants</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="{{ route('inscription') }}">Créer un nouvel étudiant</a>
        </div>

        <!-- Barre de recherche -->
        <form action="{{ route('etudiants.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Rechercher un étudiant" value="{{ request()->query('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    @if($noResults)
        <div class="alert alert-warning">Aucun étudiant ne correspond à votre recherche.</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Sexe</th>
                <th>Âge</th>
                <th>Formation</th>
                <th>Mode</th>
                <th>Ville</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->tel }}</td>
                    <td>{{ $etudiant->sexe }}</td>
                    <td>{{ $etudiant->age }}</td>
                    <td>{{ $etudiant->formation }}</td>
                    <td>{{ $etudiant->mode }}</td>
                    <td>{{ $etudiant->ville }}</td>
                    <td>
                        <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" class="action-form">
                            <a class="btn b1" href="{{ route('etudiants.show', $etudiant->id) }}">Afficher</a>
                            <a class="btn b2" href="{{ route('etudiants.edit', $etudiant->id) }}">Modifier</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn b3">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">Aucun étudiant disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $etudiants->links() }}
    </div>
</div>
@endsection
