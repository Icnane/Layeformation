@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Créer un nouveau Quiz</div>

    <div class="card-body">
        <form action="{{ route('quiz.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="titre">Titre du Quiz</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="chapitre_id">Chapitre associé</label>
                <select name="chapitre_id" id="chapitre_id" class="form-control">
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}">{{ $chapitre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="question">Question du Quiz</label>
                <textarea name="question" id="question" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
</div>
@endsection
