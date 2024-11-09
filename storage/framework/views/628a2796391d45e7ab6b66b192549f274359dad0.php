<!doctype html>
<html class="no-js" lang="en">
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <?php echo $__env->make('partials.sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/styles.css'); ?>

    <div class="form-container">
        <h2>Formulaire d'inscription d'Étudiant</h2>
        <form id="student-form" action="<?php echo e(route('etudiants.store')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <!-- Champ Nom avec astérisque rouge -->
            <label for="nom">Nom Complet: <span class="required">*</span></label>
            <input type="text" id="nom" name="nom" required>

            <!-- Champ Prénom avec astérisque rouge -->
            <label for="prenom">Prénom: <span class="required">*</span></label>
            <input type="text" id="prenom" name="prenom" required>

            <!-- Champ Email avec astérisque rouge -->
            <label for="email">Email: <span class="required">*</span></label>
            <input type="email" id="email" name="email" required>

            <!-- Sélection de genre avec cases à cocher et espacement ajusté -->
            <label for="genre">Genre:</label>
            <div class="centered-flex">
                <label for="M">Homme</label>
                <input type="checkbox" id="M" name="genre" value="M" class="genre-checkbox">
                <label for="F">Femme</label>
                <input type="checkbox" id="F" name="genre" value="F" class="genre-checkbox">
            </div>

            <!-- Champ Formation avec astérisque rouge -->
            <label for="formation">Sélectionnez votre formation: <span class="required">*</span></label>
            <select id="formation" name="formation" required>
                <option value="">--Sélectionnez une formation--</option>
                <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($formation->id); ?>"><?php echo e($formation->nom); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <!-- Mode de paiement avec cases à cocher, icônes et espacement ajusté -->
            <label for="mode_paiement">Mode de Paiement: <span class="required">*</span></label>
            <div class="centered-flex">
                <label for="carte-bancaire">
                    <i class="fa fa-credit-card"></i> Carte Bancaire
                </label>
                <input type="checkbox" id="carte-bancaire" name="mode_paiement" value="Carte Bancaire" class="payment-checkbox">
                
                <label for="mobile-money">
                    <i class="fa fa-mobile"></i> Mobile Money
                </label>
                <input type="checkbox" id="mobile-money" name="mode_paiement" value="Mobile Money" class="payment-checkbox">
            </div>

            <!-- Formulaire pour le paiement par carte bancaire -->
            <div id="cardForm" style="display: none;">
                <h3>Paiement par Carte Bancaire</h3>
                <label for="card-number">Numéro de Carte:</label>
                <input type="text" id="card-number" placeholder="1234 5678 9012 3456">
                <label for="expiry-date">Date d'expiration:</label>
                <input type="text" id="expiry-date" placeholder="MM/AA">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" placeholder="123">
            </div>

            <!-- Boutons pour afficher les QR Codes de Mobile Money -->
            <div id="qrButton" style="display: none;">
                <button type="button" id="payButtonOrange">Générer le QR Code Orange</button>
                <button type="button" id="payButtonMoov">Générer le QR Code Moov</button>
            </div>

            <!-- Section pour afficher le QR Code -->
            <div id="qrCodeContainer" style="margin-top: 20px;"></div>

            <!-- Ville de résidence -->
            <label for="ville">Ville de Résidence:</label>
            <select id="ville" name="ville">
                <option value="">--Sélectionnez une ville--</option>
                <!-- Les options de ville seront ajoutées ici par JavaScript -->
            </select>

            <!-- Bouton de soumission -->
            <button type="submit">S'inscrire</button>
        </form>
    </div>

    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Inclusion de QRCode.js et Font Awesome pour les icônes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        const cardForm = document.getElementById('cardForm');
        const qrButton = document.getElementById('qrButton');
        const payButtonOrange = document.getElementById('payButtonOrange');
        const qrCodeContainer = document.getElementById('qrCodeContainer');
        const villeSelect = document.getElementById('ville');

        document.querySelectorAll('.payment-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (checkbox.id === 'carte-bancaire') {
                    cardForm.style.display = checkbox.checked ? 'block' : 'none';
                } else if (checkbox.id === 'mobile-money') {
                    if (checkbox.checked) {
                        qrButton.style.display = 'block';
                    } else {
                        qrButton.style.display = 'none';
                        qrCodeContainer.innerHTML = ''; // Efface le QR Code quand Mobile Money est décoché
                    }
                }
            });
        });

        payButtonOrange.addEventListener('click', function() {
            qrCodeContainer.innerHTML = ''; // Réinitialise le contenu du conteneur
            const qrData = '*144*2*1*64590513#';
            const qrcode = new QRCode(qrCodeContainer, {
                text: qrData,
                width: 128,
                height: 128,
            });
        });

        // Fonction pour récupérer les villes du Burkina Faso
        async function loadCities() {
            try {
                const response = await fetch('https://fr.wikipedia.org/wiki/Liste_de_villes_du_Burkina_Faso'); // URL d'une API pour les villes
                const data = await response.json();
                
                // Exemple d'extraction des villes (à adapter en fonction de la structure de l'API)
                const cities = data.features.map(feature => feature.properties.city); // Ajustez cette ligne selon l'API que vous utilisez

                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city; // Assurez-vous que la propriété correspond à votre API
                    option.textContent = city;
                    villeSelect.appendChild(option);
                });
            } catch (error) {
                console.error('Erreur lors de la récupération des villes:', error);
            }
        }

        // Charger les villes lorsque la page est prête
        document.addEventListener('DOMContentLoaded', loadCities);
    </script>

    <style>
        .required {
            color: red;
        }
        .centered-flex {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 10px;
        }
    </style>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/partials/inscription.blade.php ENDPATH**/ ?>