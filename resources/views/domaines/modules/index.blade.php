@extends('layouts.layout')

@section('content')
    <h1>Liste des modules</h1>
    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Ajouter un module</a>

    <div class="list-group">
        @foreach ($modules as $module)
            <a href="{{ route('modules.show', $module->id) }}" class="list-group-item list-group-item-action">
                {{ $module->titre }}
            </a>
        @endforeach
    </div>

    @if($modules->isEmpty())
        <div class="alert alert-warning mt-3" role="alert">
            Aucun module trouvé. Ajoutez un module pour commencer.
        </div>
    @endif
@endsection
