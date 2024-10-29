@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Modules et Chapitres</div>

    <table class="table">
        <thead>
            <tr>
                <th>Titre du Module</th>
                <th>Nombre de Chapitres</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($modules as $module)
            <tr>
                <td>{{ $module->titre }}</td> <!-- Assurez-vous que 'titre' est le champ correct -->
                <td>{{ $module->chapitres->count() }}</td> <!-- Compte le nombre de chapitres -->
                <td>
                <a class="btn btn-warning" href="{{ route('modules.show', $module->id) }}">Afficher</a>
                 <!-- Bouton en bleu -->
                    <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button> <!-- Bouton en rouge -->
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Aucun module trouvé.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <!-- Pagination si nécessaire -->
    </div>
</div>
@endsection
