<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Éditer le Quiz : <?php echo e($quiz->titre); ?></div>
    <div class="card-body">
        <form action="<?php echo e(route('quiz.update', $quiz->id)); ?>" method="POST" id="quiz-form">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="titre">Titre du Quiz</label>
                <input type="text" name="titre" id="titre" class="form-control" value="<?php echo e($quiz->titre); ?>" required>
            </div>

            <div class="form-group">
                <label for="chapitre_id">Chapitre associé</label>
                <select name="chapitre_id" id="chapitre_id" class="form-control" required>
                    <?php $__currentLoopData = $chapitres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapitre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chapitre->id); ?>" <?php echo e($quiz->chapitre_id == $chapitre->id ? 'selected' : ''); ?>>
                            <?php echo e($chapitre->titre); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div id="questions-container">
                <h5>Questions du Quiz</h5>
                <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="question-block" id="question-block-<?php echo e($index); ?>">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea name="questions[<?php echo e($index); ?>][text]" class="form-control question-text" rows="2" required><?php echo e($question->text); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Type de question</label>
                            <select name="questions[<?php echo e($index); ?>][type]" class="form-control question-type" onchange="toggleOptions(this, <?php echo e($index); ?>)">
                                <option value="multiple" <?php echo e($question->type == 'multiple' ? 'selected' : ''); ?>>Choix multiples</option>
                                <option value="true_false" <?php echo e($question->type == 'true_false' ? 'selected' : ''); ?>>Vrai/Faux</option>
                            </select>
                        </div>
                        <div class="options-container">
                            <label>Options</label>
                            <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" name="questions[<?php echo e($index); ?>][options][]" class="form-control" value="<?php echo e($option); ?>" required>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <button type="button" class="btn btn-success" id="add-question" onclick="addQuestion()">Ajouter une question</button>
            <button type="submit" class="btn btn-primary" id="submit-button" style="margin-top: 10px;">Sauvegarder le quiz</button>
        </form>
    </div>
</div>

<script>
    let questionIndex = <?php echo e(count($quiz->questions)); ?>; // Initialiser avec le nombre de questions existantes

    function addQuestion() {
        if (questionIndex < 10) {
            const container = document.getElementById('questions-container');
            const newQuestionBlock = document.createElement('div');
            newQuestionBlock.className = 'question-block';
            newQuestionBlock.id = 'question-block-' + questionIndex;
            newQuestionBlock.innerHTML = `
                <div class="form-group">
                    <label for="question">Question</label>
                    <textarea name="questions[${questionIndex}][text]" class="form-control question-text" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="type">Type de question</label>
                    <select name="questions[${questionIndex}][type]" class="form-control question-type" onchange="toggleOptions(this, ${questionIndex})">
                        <option value="multiple">Choix multiples</option>
                        <option value="true_false">Vrai/Faux</option>
                    </select>
                </div>
                <div class="options-container">
                    <label>Options</label>
                    <input type="text" name="questions[${questionIndex}][options][]" class="form-control" placeholder="Option 1" required>
                    <input type="text" name="questions[${questionIndex}][options][]" class="form-control" placeholder="Option 2" required>
                </div>
            `;
            container.appendChild(newQuestionBlock);
            questionIndex++;

            // Si 10 questions, cacher le bouton d'ajout et montrer le bouton de sauvegarde
            if (questionIndex === 10) {
                document.getElementById('submit-button').style.display = 'inline-block';
                document.getElementById('add-question').style.display = 'none';
            }
        }
    }

    function toggleOptions(selectElement, index) {
        const optionsContainer = selectElement.closest('.question-block').querySelector('.options-container');
        if (selectElement.value === 'true_false') {
            optionsContainer.innerHTML = `
                <label>Options</label>
                <input type="text" name="questions[${index}][options][]" class="form-control" value="Vrai" readonly>
                <input type="text" name="questions[${index}][options][]" class="form-control" value="Faux" readonly>
            `;
        } else {
            optionsContainer.innerHTML = `
                <label>Options</label>
                <input type="text" name="questions[${index}][options][]" class="form-control" placeholder="Option 1" required>
                <input type="text" name="questions[${index}][options][]" class="form-control" placeholder="Option 2" required>
            `;
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/quiz/edit.blade.php ENDPATH**/ ?>