@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Modifier le Chapitre</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chapitres.update', $chapitre->id) }}" method="POST" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre', $chapitre->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="module_id">Module :</label>
            <select name="module_id" class="form-control" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" {{ old('module_id', $chapitre->module_id) == $module->id ? 'selected' : '' }}>{{ $module->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" class="form-control" required>{{ old('description', $chapitre->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Mettre à Jour</button>
    </form>
</div>
@endsection
