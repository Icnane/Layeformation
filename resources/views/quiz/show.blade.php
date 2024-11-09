@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">{{ $quiz->titre }}</div>
    <div class="card-body">
        <h5>Chapitre associé : {{ $quiz->chapitre->titre }}</h5>
        
        <h6>Questions :</h6>
        @if($quiz->questions->isEmpty())
            <div class="alert alert-warning">Aucune question disponible pour ce quiz.</div>
        @else
            <ul>
                @foreach($quiz->questions as $question)
                    <li>
                        <strong>{{ $question->text }}</strong>
                        <ul>
                            @foreach($question->options as $option)
                                <li>{{ $option }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif

        <hr>
        
        <div class="btn-group" role="group">
            <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-warning btn-sm" title="Éditer le quiz">
                <i class="fa fa-edit"></i> Éditer
            </a>
            
            <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le quiz">
                    <i class="fa fa-trash"></i> Supprimer
                </button>
            </form>
            
            <a href="{{ route('quiz.index') }}" class="btn btn-secondary btn-sm" title="Retour à la liste des quizzes">
                <i class="fa fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection
