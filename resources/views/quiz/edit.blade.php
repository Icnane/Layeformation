@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Modifier le Quiz : {{ $quiz->titre }}</div>

    <div class="card-body">
        <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre">Titre du Quiz</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ $quiz->titre }}" required>
            </div>

            <div class="form-group">
                <label for="chapitre_id">Chapitre associé</label>
                <select name="chapitre_id" id="chapitre_id" class="form-control">
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}" {{ $quiz->chapitre_id == $chapitre->id ? 'selected' : '' }}>
                            {{ $chapitre->titre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="question">Question du Quiz</label>
                <textarea name="question" id="question" class="form-control" rows="3" required>{{ $quiz->question }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
