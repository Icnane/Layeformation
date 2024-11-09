<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Liste des Quizzes</div>
    <div class="card-body">
        <div class="mb-3">
            <a href="<?php echo e(route('quiz.create')); ?>" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Créer un nouveau Quiz
            </a>
        </div>

        <?php if($quizzes->isEmpty()): ?>
            <div class="alert alert-info">Aucun quiz disponible pour le moment.</div>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Chapitre associé</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($quiz->titre); ?></td>
                            <td><?php echo e($quiz->chapitre->titre); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo e(route('quiz.show', $quiz->id)); ?>" class="btn b1" title="Voir le quiz">
                                        <i class="fa fa-eye"></i> Voir
                                    </a>
                                    <a href="<?php echo e(route('quiz.edit', $quiz->id)); ?>" class="btn b2" title="Éditer le quiz">
                                        <i class="fa fa-edit"></i> Éditer
                                    </a>
                                    <form action="<?php echo e(route('quiz.destroy', $quiz->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le quiz">
                                            <i class="fa fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/quiz/index.blade.php ENDPATH**/ ?>