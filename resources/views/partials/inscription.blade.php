<!doctype html>
<html class="no-js" lang="en">

@include('partials.head')

<body>
    <!--header-top start -->
    @include('partials.sidbar')
    @vite('resources/css/styles.css')

    <div class="form-container">
        <h2>Formulaire d'inscription d'Étudiant</h2>
        <form id="student-form" action="{{ route('etudiants.store') }}" method="post">
            @csrf

            <label for="id">IDENTIFIANT:</label>
            <input type="number" id="id" name="id" min="1" required>

            <label for="nom">Nom Complet:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="sexe">Sexe:</label>
            <div>
                <input type="radio" id="M" name="sexe" value="M" required>
                <label for="M">M</label>
                <input type="radio" id="F" name="sexe" value="F" required>
                <label for="F">Femme</label>
            </div>

            <label for="age">Âge:</label>
            <input type="number" id="age" name="age" min="16" max="100" required>

            <label for="formation">Sélectionnez votre formation:</label>
            <select id="formation" name="formation" required>
                <option value="">--Sélectionnez une formation--</option>
                <!-- Ajout des options de formation (pas modifié) -->
                <!-- Code inchangé ici... -->
            </select>

            <!-- Mode de paiement -->
            <label for="mode_paiement">Mode de Paiement:</label>
            <div>
                <label for="carte-bancaire">Carte Bancaire</label>
                <input type="radio" id="carte-bancaire" name="mode_paiement" value="Carte Bancaire" required>
                <label for="mobile-money">Mobile Money</label>
                <input type="radio" id="mobile-money" name="mode_paiement" value="Mobile Money" required>
            </div>

            <label for="ville">Ville de Résidence:</label>
            <select id="ville" name="ville" required>
                <option value="">--Sélectionnez une ville--</option>
                <!-- Ajout des options de ville (pas modifié) -->
                <!-- Code inchangé ici... -->
            </select>

            <button type="submit">S'inscrire</button>
        </form>

        <div id="message" class="alert alert-info mt-3" style="display:none;"></div> <!-- Message d'information -->

        <!-- QR Code display -->
        <div id="qr-code" style="margin-top: 20px;">
            <!-- Le QR code sera injecté ici après la soumission -->
        </div>
    </div>

    @include('components.footer')

    <script>
    document.getElementById('student-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche la soumission immédiate

        // Récupère le mode de paiement sélectionné
        var modePaiement = document.querySelector('input[name="mode_paiement"]:checked').value;

        // Génère le QR code en fonction du mode de paiement
        if (modePaiement) {
            fetch(`/generate-qr-code/${modePaiement}`) // Envoie une requête au backend pour générer le QR code
            .then(response => response.json())
            .then(data => {
                // Affiche le QR code dans l'élément dédié
                document.getElementById('qr-code').innerHTML = `<img src="data:image/png;base64,${data.qrCode}" alt="QR Code" />`;
            })
            .catch(error => {
                console.error('Erreur lors de la génération du QR code:', error);
            });
        }
    });
    </script>
</body>
</html>
