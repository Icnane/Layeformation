@extends('layouts.layout')

@section('content')
    <div class="chapitre-details">
        <h1>{{ $chapitre->titre }}</h1>
        <p>{{ $chapitre->description }}</p>

        <!-- Affichage de la vidéo -->
        <h2>Vidéo :</h2>
        @if($chapitre->chemin_video)
            <div>
                <video width="320" height="240" controls>
                    <source src="{{ asset('storage/'.$chapitre->chemin_video) }}" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéos.
                </video>
                <br>
                <!-- <a href="{{ asset('storage/' . $chapitre->chemin_video) }}" class="btn btn-secondary" download>Télécharger la vidéo</a> -->
            </div>
        @else
            <p>Aucune vidéo disponible pour ce chapitre.</p>
        @endif

        <!-- Affichage du quiz associé -->
        @if($chapitre->quiz)
            <h2>Quiz : {{ $chapitre->quiz->titre }}</h2>
            <div class="quiz-content">
                @foreach($chapitre->quiz->questions as $question)
                    <div class="question">
                        <h4>{{ $question->contenu }}</h4>
                        <ul>
                            @foreach($question->options as $option)
                                <li>
                                    {{ $option->contenu }}
                                    @if($option->est_correct)
                                        <span style="color: green;">(Correct)</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @else
            <p>Aucun quiz associé à ce chapitre.</p>
        @endif
    </div>
@endsection
