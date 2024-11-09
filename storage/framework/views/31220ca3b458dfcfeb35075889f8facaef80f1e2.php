<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header"><?php echo e($quiz->titre); ?></div>
    <div class="card-body">
        <h5>Chapitre associé : <?php echo e($quiz->chapitre->titre); ?></h5>
        
        <h6>Questions :</h6>
        <?php if($quiz->questions->isEmpty()): ?>
            <div class="alert alert-warning">Aucune question disponible pour ce quiz.</div>
        <?php else: ?>
            <ul>
                <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <strong><?php echo e($question->text); ?></strong>
                        <ul>
                            <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($option); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <hr>
        
        <div class="btn-group" role="group">
            <a href="<?php echo e(route('quiz.edit', $quiz->id)); ?>" class="btn btn-warning btn-sm" title="Éditer le quiz">
                <i class="fa fa-edit"></i> Éditer
            </a>
            
            <form action="<?php echo e(route('quiz.destroy', $quiz->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le quiz">
                    <i class="fa fa-trash"></i> Supprimer
                </button>
            </form>
            
            <a href="<?php echo e(route('quiz.index')); ?>" class="btn btn-secondary btn-sm" title="Retour à la liste des quizzes">
                <i class="fa fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/quiz/show.blade.php ENDPATH**/ ?>