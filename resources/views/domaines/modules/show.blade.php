@extends('layouts.layout')

@section('content')
    <h1>{{ $module->titre }}</h1>
    <p>{{ $module->description }}</p>

    {{-- Si un lien vidéo YouTube est présent, l'intégrer dans un iframe --}}
    @if($module->lien_video)
        <div class="mb-3">
            <iframe width="560" height="315" src="{{ $module->lien_video }}" frameborder="0" allowfullscreen></iframe>
        </div>
    @endif

    {{-- Si une vidéo est téléversée localement, l'afficher dans un lecteur vidéo HTML5 --}}
    @if($module->chemin_video)
        <div class="mb-3">
            <video width="560" height="315" controls>
                <source src="{{ Storage::url($module->chemin_video) }}" type="video/mp4">
                Votre navigateur ne supporte pas la balise vidéo.
            </video>
        </div>
    @endif

    <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour à la liste</a>
@endsection
