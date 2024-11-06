@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">{{ $quiz->titre }}</div>
    <div class="card-body">
        <h5>Chapitre associé : {{ $quiz->chapitre->titre }}</h5>
        <h6>Questions :</h6>
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
        <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-warning">Éditer</a>
        <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        <a href="{{ route('quiz.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection
