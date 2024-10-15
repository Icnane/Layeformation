@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $module->title }}</h1>

    <p><strong>Description:</strong> {{ $module->description }}</p>

    <p><strong>Vidéo:</strong></p>
    @if($module->video_url)
        <iframe width="560" height="315" src="{{ $module->video_url }}" frameborder="0" allowfullscreen></iframe>
    @else
        <p>Pas de vidéo disponible.</p>
    @endif

    <p><strong>Formation:</strong> {{ $module->formation->name ?? 'N/A' }}</p>
    <p><strong>Domaine:</strong> {{ $module->formation->domain->name ?? 'N/A' }}</p>

    <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
