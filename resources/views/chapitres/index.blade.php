{{-- resources/views/chapitres/resources/index.blade.php --}}

@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Liste des Chapitres</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chapitres as $chapitre)
                <tr>
                    <td>{{ $chapitre->titre }}</td>
                    <td>{{ $chapitre->description }}</td>
                    <td>
                        <a href="{{ route('chapitres.edit', $chapitre->id) }}" class="btn btn-warning">Éditer</a>
                        <form action="{{ route('chapitres.destroy', $chapitre->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $chapitres->links() }} {{-- Pour la pagination --}}
</div>
@endsection
