<?php $__env->startSection('content'); ?>
    <div class="chapitre-details">
        <h1><?php echo e($chapitre->titre); ?></h1>
        <p><?php echo e($chapitre->description); ?></p>

        <!-- Affichage de la vidéo -->
        <h2>Vidéo :</h2>
        <?php if($chapitre->chemin_video): ?>
            <div>
                <video width="320" height="240" controls>
                    <source src="<?php echo e(asset('storage/'.$chapitre->chemin_video)); ?>" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéos.
                </video>
                <br>
                <!-- <a href="<?php echo e(asset('storage/' . $chapitre->chemin_video)); ?>" class="btn btn-secondary" download>Télécharger la vidéo</a> -->
            </div>
        <?php else: ?>
            <p>Aucune vidéo disponible pour ce chapitre.</p>
        <?php endif; ?>

        <!-- Affichage du quiz associé -->
        <?php if($chapitre->quiz): ?>
            <h2>Quiz : <?php echo e($chapitre->quiz->titre); ?></h2>
            <div class="quiz-content">
                <?php $__currentLoopData = $chapitre->quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="question">
                        <h4><?php echo e($question->contenu); ?></h4>
                        <ul>
                            <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php echo e($option->contenu); ?>

                                    <?php if($option->est_correct): ?>
                                        <span style="color: green;">(Correct)</span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p>Aucun quiz associé à ce chapitre.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/chapitres/show.blade.php ENDPATH**/ ?>