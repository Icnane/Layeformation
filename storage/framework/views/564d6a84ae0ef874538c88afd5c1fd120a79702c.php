<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">Liste des Domaines</div>

    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="<?php echo e(route('domaines.create')); ?>">Créer un nouveau domaine</a>
        </div>

        <!-- Barre de recherche -->
        <form action="<?php echo e(route('domaines.index')); ?>" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un domaine" value="<?php echo e(request()->query('search')); ?>" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    <?php if($noResults): ?>
        <div class="alert alert-warning">Aucun domaine ne correspond à votre recherche.</div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Logo</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $domaines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domaine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($domaine->id); ?></td>
                <td><?php echo e($domaine->nom); ?></td>
                <td><img src="<?php echo e(asset('storage/' . $domaine->logo)); ?>" alt="<?php echo e($domaine->nom); ?>" style="height: 50px; margin-right: 10px;"></td>
                <td>
                    <form action="<?php echo e(route('domaines.destroy', $domaine->id)); ?>" method="POST" style="display:inline;">
                        <a class="btn b1" href="<?php echo e(route('domaines.show', $domaine->id)); ?>">Afficher</a>
                        <a class="btn b2" href="<?php echo e(route('domaines.edit', $domaine->id)); ?>">Modifier</a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4">Aucun domaine trouvé.</td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>

    <!-- Pagination -->
    <?php echo e($domaines->links()); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/domaines/index.blade.php ENDPATH**/ ?>