@extends('layouts.layout')

@section('content')
@vite('resources/css/stylefrom.css')
<body>
    <div class="form-container">
        <h2>Formulaire de création de Module</h2>
        <form action="{{ route('modules.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="titre">Titre du Module:</label>
                <input type="text" id="titre" name="titre" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="formation_id">Sélectionnez la formation associée:</label>
                <select id="formation_id" name="formation_id" required>
                    <option value="">--Sélectionnez une formation--</option>
                    @foreach ($formations as $formation)
                        <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Créer</button>
        </form>
    </div>
@endsection
