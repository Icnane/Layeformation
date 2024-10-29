<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
    @vite('resources/css/style.css')
</head>
<body>
    <div class="navhauteur">
        <h2>Mon apprentissage</h2>
        <nav class="nav-menu">
            <ul class="menu">
                <li><a href="{{ route('progression') }}">Progression</a></li>
                <li><a href="#" onclick="showSection('mes-cours')">Mes Cours</a></li>
                <li><a href="#" onclick="showSection('mes-paiements')">Mes Paiements</a></li>
                <li><a href="#" onclick="showSection('mes-certificats')">Mes Certificats et Attestations</a></li>
            </ul>
        </nav>
    </div>

    <div class="content" id="contentArea">
        <!-- Section Progression -->
        <div id="progression" class="section">
            <h1>Progression</h1>
            <p>Affichage de la progression ici...</p>
        </div>

        <!-- Section Mes Cours -->
        <div id="mes-cours" class="section" style="display:none;">
            <h1>Mes Cours</h1>
            <ul id="moduleList">
                @foreach($modules as $index => $module)
                    <li>
                        <div class="circle" id="circle{{ $index }}"></div>
                        <a href="#" class="sidebar-module" data-module-index="{{ $index }}">{{ $module->titre }}</a>
                        <ul class="chapters" id="chapters{{ $index }}">
                            @foreach($module->chapitres as $chapitre)
                                <li><a href="#" class="chapter" data-module-index="{{ $index }}" data-chapter="{{ $chapitre->id }}">{{ $chapitre->titre }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Section Mes Paiements -->
        <div id="mes-paiements" class="section" style="display:none;">
            <h1>Mes Paiements</h1>
            <p>Affichage des paiements ici...</p>
        </div>

        <!-- Section Mes Certificats -->
        <div id="mes-certificats" class="section" style="display:none;">
            <h1>Mes Certificats et Attestations</h1>
            <input type="text" id="attestationName" placeholder="Votre nom et prénom" />
            <button id="downloadAttestationButton">Télécharger Maintenant</button>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.style.display = 'none'; // Masquer toutes les sections
            });
            document.getElementById(sectionId).style.display = 'block'; // Afficher la section sélectionnée
        }

        // Événement pour le bouton de téléchargement d'attestation
        document.getElementById('downloadAttestationButton').addEventListener('click', () => {
            const name = document.getElementById('attestationName').value.trim();
            if (name) {
                generatePDF(name);
            } else {
                alert('Veuillez entrer votre nom et prénom.');
            }
        });

        // Fonction pour générer le PDF de l'attestation
        function generatePDF(name) {
            const doc = new jsPDF();
            const courseName = 'Nom du cours'; // Remplacer par le cours terminé
            const date = new Date().toLocaleDateString();

            doc.setFontSize(20);
            doc.text('Attestation de Formation', 20, 20);
            doc.setFontSize(12);
            doc.text(`Cette attestation certifie que`, 20, 40);
            doc.text(`${name}`, 20, 50);
            doc.text(`a complété avec succès le module :`, 20, 60);
            doc.text(`${courseName}`, 20, 70);
            doc.text(`Date : ${date}`, 20, 80);
            doc.text(`_______________________`, 20, 100);
            doc.text(`Signature de LayFormation`, 20, 110);

            doc.save('attestation.pdf');
        }
    </script>

    <!-- Inclure jsPDF depuis un CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>
