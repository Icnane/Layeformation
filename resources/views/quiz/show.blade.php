@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Détails du Quiz : {{ $quiz->titre }}</div>

    <div class="card-body">
        <h5>Titre : {{ $quiz->titre }}</h5>
        <p><strong>Chapitre :</strong> {{ $quiz->chapitre->titre }}</p>
        <p><strong>Question :</strong> {{ $quiz->question }}</p>

        <a class="btn btn-warning" href="{{ route('quiz.edit', $quiz->id) }}">Modifier</a>

        <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>

        <a class="btn btn-primary" href="{{ route('quiz.index') }}">Retour à la liste</a>
    </div>
</div>
@endsection
