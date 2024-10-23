<!doctype html>
<html lang="en">
@include('partials.head')

<body>
    @include('partials.sidbar')
    @vite('resources/css/styles.css')

    <div class="form-container">
        <h2>Formulaire de création de Module</h2>
        <form action="{{ route('modules.store') }}" method="post">
            @csrf

            <label for="titre">Titre du Module:</label>
            <input type="text" id="titre" name="titre" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>

            <label for="formation_id">Sélectionnez la formation associée:</label>
            <select id="formation_id" name="formation_id" required>
                <option value="">--Sélectionnez une formation--</option>
                @foreach ($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                @endforeach
            </select>

            <input type="submit" value="Créer">
        </form>
    </div>

    @include('components.footer')
</body>
</html>
