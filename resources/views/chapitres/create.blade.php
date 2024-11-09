@extends('layouts.layout')

@section('content')

<body>
    @vite('resources/css/styles.css')
    <div class="form-container">
        <h2>Formulaire d'ajout de Chapitre</h2>

        <form action="{{ route('chapitres.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Titre du chapitre -->
            <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" required>
            </div>

            <!-- Sélection du module -->
            <div class="form-group">
                <label for="module_id">Sélectionnez un Module :</label>
                <select id="module_id" name="module_id">
                    <option value="">--Sélectionnez un module--</option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->titre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Sélection du quiz (facultatif) -->
            <div class="form-group">
                <label for="quiz_id">Sélectionnez un Quiz (facultatif):</label>
                <select id="quiz_id" name="quiz_id">
                    <option value="">--Sélectionnez un quiz (optionnel)--</option>
                    @foreach($quizzes as $quiz)
                        <option value="{{ $quiz->id }}">{{ $quiz->titre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Description du chapitre -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>

            <!-- Téléchargement de la vidéo -->
            <div class="form-group">
                <label for="chemin_video">Télécharger la vidéo:</label>
                <input type="file" id="chemin_video" name="chemin_video" accept="video/*">
            </div>

            <!-- Bouton d'ajout -->
            <input type="submit" value="Ajouter le Chapitre">
        </form>
    </div>

@endsection
