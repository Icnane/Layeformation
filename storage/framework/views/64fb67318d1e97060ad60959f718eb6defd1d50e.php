<?php $__env->startSection('content'); ?>

<body>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/styles.css'); ?>
    <div class="form-container">
        <h2>Formulaire d'ajout de Chapitre</h2>

        <form action="<?php echo e(route('chapitres.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <!-- Titre du chapitre -->
            <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" required>
            </div>

            <!-- Sélection du module -->
            <div class="form-group">
                <label for="module_id">Sélectionnez un Module :</label>
                <select id="module_id" name="module_id">
                    <option value="">--Sélectionnez un module--</option>
                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($module->id); ?>"><?php echo e($module->titre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Sélection du quiz (facultatif) -->
            <div class="form-group">
                <label for="quiz_id">Sélectionnez un Quiz (facultatif):</label>
                <select id="quiz_id" name="quiz_id">
                    <option value="">--Sélectionnez un quiz (optionnel)--</option>
                    <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($quiz->id); ?>"><?php echo e($quiz->titre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Description du chapitre -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>

            <!-- Téléchargement de la vidéo -->
            <div class="form-group">
                <label for="chemin_video">Télécharger la vidéo:</label>
                <input type="file" id="chemin_video" name="chemin_video" accept="video/*">
            </div>

            <!-- Bouton d'ajout -->
            <input type="submit" value="Ajouter le Chapitre">
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/chapitres/create.blade.php ENDPATH**/ ?>