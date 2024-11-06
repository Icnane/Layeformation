@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Quizzes</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Chapitre associé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->titre }}</td>
                        <td>{{ $quiz->chapitre->titre }}</td>
                        <td>
                            <a href="{{ route('quiz.show', $quiz->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('quiz.create') }}" class="btn btn-success">Créer un nouveau Quiz</a>
    </div>
</div>
@endsection
