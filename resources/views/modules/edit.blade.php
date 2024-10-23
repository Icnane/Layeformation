@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Modifier le Module</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('modules.update', $module->id) }}" method="POST" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id">ID :</label>
            <input type="number" name="id" class="form-control" value="{{ $module->id }}" required readonly>
        </div>

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre', $module->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" class="form-control">{{ old('description', $module->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="formation_id">Formation :</label>
            <select name="formation_id" class="form-control" required>
                @foreach ($formations as $formation)
                    <option value="{{ $formation->id }}" {{ $formation->id == $module->formation_id ? 'selected' : '' }}>
                        {{ $formation->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à Jour</button>
    </form>
</div>
@endsection
