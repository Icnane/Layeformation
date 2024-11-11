<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/styles.css'); ?>
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
    <?php echo $__env->make('partials.sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content" id="apprentissage">
        <h2>Mon apprentissage</h2>
        <nav class="nav-menu">
            <ul class="menu">
                <li><a href="<?php echo e(route('progression')); ?>">Progression</a></li>
                <li><a href="<?php echo e(route('mescours')); ?>">Mes Cours</a></li>
                <li><a href="#" onclick="showSection('mes-paiements')">Mes Paiements</a></li>
                <li><a href="#" onclick="showSection('mes-certificats')">Mes Certificats et Attestations</a></li>
            </ul>
        </nav>

        <!-- Affichage des modules et chapitres -->
        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h3><?php echo e($module->titre); ?></h3>

            <?php $__currentLoopData = $module->chapitres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapitre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h4><?php echo e($chapitre->titre); ?></h4>

                <!-- Affichage des vidéos -->
            <?php if($chapitre->chemin_video): ?>
                    <h5>Vidéos :</h5>
                    <video controls width="320" height="240">
                        <source src="<?php echo e(asset('storage/' . $chapitre->chemin_video)); ?>" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de vidéo.
                    </video>
                <?php else: ?>
                    <p>Aucune vidéo disponible pour ce chapitre.</p>
                <?php endif; ?>

                <!-- Affichage du quiz -->
                <?php if($chapitre->quiz && $chapitre->quiz->isNotEmpty()): ?>
                    <h5>Quiz :</h5>
                    <?php $__currentLoopData = $chapitre->quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="quiz-container">
                            <p><strong><?php echo e($quiz->titre); ?></strong></p>
                            <button onclick="toggleQuiz(<?php echo e($quiz->id); ?>)">Commencer le quiz</button>

                            <div id="quiz-container-<?php echo e($quiz->id); ?>" style="display: none;">
                                <form id="quiz-form-<?php echo e($quiz->id); ?>" action="<?php echo e(route('quiz.submit', $quiz->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div id="questions-container-<?php echo e($quiz->id); ?>">
                                        <!-- Les questions seront chargées ici dynamiquement -->
                                    </div>
                                    <button type="submit">Soumettre le quiz</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p>Aucun quiz disponible pour ce chapitre.</p>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/partials/mescours.blade.php ENDPATH**/ ?>