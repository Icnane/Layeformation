<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('partials.head')
    @vite('resources/css/styles.css')
    <style>
        /* Style global */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Style du menu */
        .menu {
            display: flex;
            gap: 20px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            position: relative;
        }

        .menu a {
            text-decoration: none;
            padding: 10px 15px;
            color: #000;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: #d2002e;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            margin-top: 0;
            color: #d25800;
            display: inline-block;
        }

        .nav-menu {
            display: inline-block;
            margin-left: 20px;
        }

        .course-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Style pour la liste des chapitres */
        .chapter-list {
            margin-top: 10px;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    @include('partials.sidbar')

    <!-- Contenu principal -->
    <div class="content" id="apprentissage">
        <h2>Mon apprentissage</h2>
        <nav class="nav-menu">
            <ul class="menu">
                <li><a href="{{ route('progression') }}">Progression</a></li>
                <li><a href="{{ route('mescours') }}">Mes Cours</a></li>
                <li><a href="#" onclick="showSection('mes-paiements')">Mes Paiements</a></li>
                <li><a href="#" onclick="showSection('mes-certificats')">Mes Certificats et Attestations</a></li>
            </ul>
        </nav>
        <br><br><br><br>

        <!-- Affichage des modules et chapitres -->
    @foreach($modules as $module)
    <h3>{{ $module->titre }}</h3> <!-- Affiche le titre du module -->
    
    @foreach($module->chapitres as $chapitre)
        <h4>{{ $chapitre->titre }}</h4> <!-- Affiche le titre du chapitre -->
        
        <!-- Affichage des vidéos associées au chapitre -->
        @if($chapitre->chemin_video)
            <h5>Vidéos :</h5>
                <video controls width="320" height="240">
                    <source src="{{ asset('storage/' . $chapitre->chemin_video) }}" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéo.
                </video>
        @else
            <p>Aucune vidéo disponible pour ce chapitre.</p>
        @endif

       <!-- Affichage du quiz associé au chapitre -->
@if($chapitre->quiz && $chapitre->quiz->isNotEmpty())
    <h5>Quiz : </h5>
    @foreach($chapitre->quiz as $quiz)
        <div>
            <p><strong>{{ $quiz->titre }}</strong></p>
            <button onclick="toggleQuiz({{ $quiz->id }})">Commencer le quiz</button>
            
            <!-- Section dynamique du quiz -->
            <div id="quiz-container-{{ $quiz->id }}" style="display: none;">
                <form id="quiz-form-{{ $quiz->id }}" action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
                    @csrf
                    <!-- Charger les questions du quiz via JavaScript -->
                    <div id="questions-container-{{ $quiz->id }}">
                        <!-- Les questions seront insérées ici dynamiquement -->
                    </div>
                    <button type="submit">Soumettre le quiz</button>
                </form>
            </div>
        </div>
    @endforeach
@else
    <p>Aucun quiz disponible pour ce chapitre.</p>
@endif

<script>
    // Fonction pour charger et afficher le quiz
    function toggleQuiz(quizId) {
        const quizContainer = document.getElementById(`quiz-container-${quizId}`);
        quizContainer.style.display = quizContainer.style.display === 'none' ? 'block' : 'none';

        // Charger les questions via AJAX
        fetch(`/quiz/${quizId}/questions`)
            .then(response => response.json())
            .then(data => {
                const questionsContainer = document.getElementById(`questions-container-${quizId}`);
                questionsContainer.innerHTML = '';

                data.questions.forEach((question, index) => {
                    const questionDiv = document.createElement('div');
                    questionDiv.innerHTML = `
                        <p><strong>${index + 1}. ${question.text}</strong></p>
                        ${question.options.map(option => `
                            <label>
                                <input type="${question.type === 'multiple' ? 'checkbox' : 'radio'}" 
                                       name="answers[${question.id}][]" value="${option.id}">
                                ${option.text}
                            </label><br>
                        `).join('')}
                    `;
                    questionsContainer.appendChild(questionDiv);
                });
            });
    }
</script>

    @endforeach
@endforeach



    
    

    @include('components.footer')
</body>

</html>