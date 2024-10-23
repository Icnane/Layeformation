<!doctype html>
<html class="no-js" lang="en">

@include('partials.head')

<body>
    @include('partials.sidbar')
    @vite('resources/css/styles.css')

    <div class="form-container">
        <h2>Formulaire d'ajout de Chapitre</h2>

        <form action="{{ route('chapitres.store') }}" method="post" enctype="multipart/form-data"> <!-- Ajouter enctype pour le téléchargement de fichiers -->
            @csrf

            <!-- Titre du chapitre -->
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" required>

            <!-- Sélection du module -->
            <label for="module_id">Sélectionnez votre Module:</label>
            <select id="module_id" name="module_id" required>
                <option value="">--Sélectionnez un module--</option>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->titre }}</option>
                @endforeach
            </select>

            <!-- Description du chapitre -->
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <!-- Téléchargement de la vidéo -->
            <label for="chemin_video">Télécharger la vidéo:</label>
            <input type="file" id="chemin_video" name="chemin_video" accept="video/*"> <!-- Champ pour télécharger la vidéo -->

            <!-- Bouton d'ajout -->
            <input type="submit" value="Ajouter le Chapitre">
        </form>
    </div>

    @include('components.footer')
</body>
</html>
