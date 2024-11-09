<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Liste des Modules</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="<?php echo e(route('modules.create')); ?>">Créer un nouveau module</a>
        </div>

        <!-- Barre de recherche -->
        <form action="<?php echo e(route('modules.index')); ?>" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un module" value="<?php echo e(request()->query('search')); ?>" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    <?php if($noResults): ?>
        <div class="alert alert-warning">Aucun module ne correspond à votre recherche.</div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Formation</th>
                <th width="250px">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($module->id); ?></td>
                    <td><?php echo e($module->titre); ?></td>
                    <td><?php echo e($module->description ?? 'Aucune description'); ?></td>
                    <td><?php echo e($module->formation->nom); ?></td>
                    <td>
                        <form action="<?php echo e(route('modules.destroy', $module->id)); ?>" method="POST" class="action-form boutonms">
                            <a class="btn b1" href="<?php echo e(route('modules.show', $module->id)); ?>">
                                Afficher
                            </a>

                            <a class="btn b2" href="<?php echo e(route('modules.edit', $module->id)); ?>">
                                Modifier
                            </a>

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn b3">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5">Aucun module disponible.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo e($modules->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/modules/index.blade.php ENDPATH**/ ?>