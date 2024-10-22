@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Quiz</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="{{ route('quiz.create') }}">Créer un nouveau Quiz</a>
        </div>

        <!-- Barre de recherche -->
        <form action="{{ route('quiz.index') }}" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un quiz" value="{{ request()->query('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
    
    @if($noResults)
        <div class="alert alert-warning">Aucun quiz ne correspond à votre recherche.</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($quiz as $quizz)
            <tr>
                <td>{{ $quizz->id }}</td>
                <td>{{ $quizz->titre }}</td>
                <td>
                    <form action="{{ route('quiz.destroy', $quizz->id) }}" method="POST" class="action-form">
                        <a class="btn btn-info" href="{{ route('quiz.show', $quizz->id) }}">Afficher</a>
                        <a class="btn btn-warning" href="{{ route('quiz.edit', $quizz->id) }}">Modifier</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Aucun quiz disponible.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $quiz->links() }}
    </div>
</div>
@endsection
