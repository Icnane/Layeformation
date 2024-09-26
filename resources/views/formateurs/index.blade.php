@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Formateurs</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="{{ route('formateurs.create') }}">Créer un nouveau formateur</a>
        </div>

        <!-- Barre de recherche -->
        <form action="{{ route('formateurs.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Rechercher un formateur" value="{{ request()->query('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    @if($noResults)
        <div class="alert alert-warning">Aucun formateur ne correspond à votre recherche.</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Contact</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($formateurs as $formateur)
                <tr>
                    <td>{{ $formateur->id }}</td>
                    <td>{{ $formateur->nom }}</td>
                    <td>{{ $formateur->prenom }}</td>
                    <td>{{ $formateur->email }}</td>
                    <td>{{ $formateur->contact }}</td>
                    <td>
                        <form action="{{ route('formateurs.destroy', $formateur->id) }}" method="POST" class="action-form">
                            <a class="btn b1" href="{{ route('formateurs.show', $formateur->id) }}">Afficher</a>
                            <a class="btn b2" href="{{ route('formateurs.edit', $formateur->id) }}">Modifier</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn b3">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucun formateur disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $formateurs->links() }}
    </div>
</div>
@endsection
