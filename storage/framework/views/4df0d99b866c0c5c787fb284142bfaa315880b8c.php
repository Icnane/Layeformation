<?php $__env->startSection('content'); ?>
<div class="card3">
    <div class="card-header">Détails du Module</div>

    <div class="module-details">
        <div class="detail-group">
            <label>ID :</label>
            <span><?php echo e($module->id); ?></span>
        </div>
        <div class="detail-group">
            <label>Titre :</label>
            <span><?php echo e($module->titre); ?></span>
        </div>
        <div class="detail-group">
            <label>Description :</label>
            <span><?php echo e($module->description); ?></span>
        </div>
        <div class="detail-group">
            <label>Formation :</label>
            <span><?php echo e($module->formation->nom); ?></span>
        </div>

        <div class="bouton1">
            <div class="return-button">
                <a class="btn btn-secondary" href="<?php echo e(route('modules.index')); ?>">Retour à la liste</a>
            </div>

            <div class="action-buttons">
                <a class="btn5 btn-success1" href="<?php echo e(route('modules.edit', $module->id)); ?>">Modifier</a>

                <form action="<?php echo e(route('modules.destroy', $module->id)); ?>" method="POST" class="delete-form">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn6 btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/modules/show.blade.php ENDPATH**/ ?>