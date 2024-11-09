@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Quizzes</div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('quiz.create') }}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Créer un nouveau Quiz
            </a>
        </div>

        @if($quizzes->isEmpty())
            <div class="alert alert-info">Aucun quiz disponible pour le moment.</div>
        @else
            <table class="table table-bordered table-striped">
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
                                <div class="btn-group" role="group">
                                    <a href="{{ route('quiz.show', $quiz->id) }}" class="btn b1" title="Voir le quiz">
                                        <i class="fa fa-eye"></i> Voir
                                    </a>
                                    <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn b2" title="Éditer le quiz">
                                        <i class="fa fa-edit"></i> Éditer
                                    </a>
                                    <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le quiz">
                                            <i class="fa fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
