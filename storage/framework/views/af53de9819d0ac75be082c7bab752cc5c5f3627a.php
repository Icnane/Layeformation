<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Liste des Modules et Chapitres</div>

    <table class="table">
        <thead>
            <tr>
                <th>Titre du Module</th>
                <th>Nombre de Chapitres</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($module->titre); ?></td> <!-- Assurez-vous que 'titre' est le champ correct -->
                <td><?php echo e($module->chapitres->count()); ?></td> <!-- Compte le nombre de chapitres -->
                <td>
                <a class="btn b2" href="<?php echo e(route('modules.show', $module->id)); ?>">Afficher</a>
                 <!-- Bouton en bleu -->
                    <form action="<?php echo e(route('modules.destroy', $module->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Supprimer</button> <!-- Bouton en rouge -->
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3">Aucun module trouvé.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <!-- Pagination si nécessaire -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/resources/index.blade.php ENDPATH**/ ?>