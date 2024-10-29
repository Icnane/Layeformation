@extends('layouts.layout')

@section('content')
    <h1>{{ $chapitre->titre }}</h1>
    <p>{{ $chapitre->description }}</p>

    <h2>Vidéos :</h2>
    @foreach ($chapitre->videos as $video)
        <div>
            <h3>{{ $video->titre }}</h3>
            <video width="320" height="240" controls>
                <source src="{{ asset('path_to_your_video_directory/' . $video->fichier) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endforeach
@endsection
