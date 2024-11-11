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

        /* Style du quiz */
        .quiz-container {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .quiz-container button {
            background-color: #d25800;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .quiz-container button:hover {
            background-color: #d2002e;
        }
    </style>
</head>

<body>
    @include('partials.sidbar')

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

        <!-- Affichage des modules et chapitres -->
        @foreach($modules as $module)
            <h3>{{ $module->titre }}</h3>

            @foreach($module->chapitres as $chapitre)
                <h4>{{ $chapitre->titre }}</h4>

                <!-- Affichage des vidéos -->
            @if($chapitre->chemin_video)
                    <h5>Vidéos :</h5>
                    <video controls width="320" height="240">
                        <source src="{{ asset('storage/' . $chapitre->chemin_video) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de vidéo.
                    </video>
                @else
                    <p>Aucune vidéo disponible pour ce chapitre.</p>
                @endif

                <!-- Affichage du quiz -->
                @if($chapitre->quiz && $chapitre->quiz->isNotEmpty())
                    <h5>Quiz :</h5>
                    @foreach($chapitre->quiz as $quiz)
                        <div class="quiz-container">
                            <p><strong>{{ $quiz->titre }}</strong></p>
                            <button onclick="toggleQuiz({{ $quiz->id }})">Commencer le quiz</button>

                            <div id="quiz-container-{{ $quiz->id }}" style="display: none;">
                                <form id="quiz-form-{{ $quiz->id }}" action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
                                    @csrf
                                    <div id="questions-container-{{ $quiz->id }}">
                                        <!-- Les questions seront chargées ici dynamiquement -->
                                    </div>
                                    <button type="submit">Soumettre le quiz</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Aucun quiz disponible pour ce chapitre.</p>
                @endif
            @endforeach
        @endforeach
    </div>

    @include('components.footer')

    <script>
        // Fonction pour basculer l'affichage du quiz et charger dynamiquement les questions
        function toggleQuiz(quizId) {
    const quizContainer = document.getElementById(`quiz-container-${quizId}`);

    // Si les questions sont déjà affichées, ne les rechargent pas
    if (quizContainer.style.display === 'none') {
        // Récupérer les questions du quiz depuis le serveur
        fetch(`/quizzes/${quizId}/questions`) // Remplacez cette URL par la route appropriée
            .then(response => response.json())
            .then(data => {
                displayQuestions(data.questions, quizId);
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des questions:', error);
            });

        quizContainer.style.display = 'block';
    } else {
        quizContainer.style.display = 'none';
    }
}

// Fonction pour afficher dynamiquement toutes les questions
function displayQuestions(questions, quizId) {
    const questionsContainer = document.getElementById(`questions-container-${quizId}`);
    questionsContainer.innerHTML = ''; // Vider le container avant d'ajouter de nouvelles questions

    questions.forEach((question, index) => {
        let questionDiv = document.createElement('div');
        questionDiv.innerHTML = `<p>${question.text}</p>`;

        if (question.type === 'multiple_choice') {
            question.options.forEach(option => {
                questionDiv.innerHTML += `
                    <div>
                        <input type="radio" name="answers[${quizId}][${question.id}]" value="${option.id}" required>
                        <label>${option.text}</label>
                    </div>
                `;
            });
        }

        if (question.type === 'true_false') {
            questionDiv.innerHTML += `
                <div>
                    <input type="radio" name="answers[${quizId}][${question.id}]" value="true" required/>
                    <label>Vrai</label>
                </div>
                <div>
                    <input type="radio" name="answers[${quizId}][${question.id}]" value="false" required/>
                    <label>Faux</label>
                </div>
            `;
        }

        questionsContainer.appendChild(questionDiv);
    });
}

    </script>
</body>

</html>
