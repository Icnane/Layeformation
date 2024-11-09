<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Cours les plus populaires</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="<?php echo e(route('formations.create')); ?>">Créer un nouvel étudiant</a>
        </div>

        <!-- Barre de recherche -->
        <form action="<?php echo e(route('formations.index')); ?>" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un étudiant" value="<?php echo e(request()->query('search')); ?>" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
    <?php if($noResults): ?>
        <div class="alert alert-warning">Aucune formation ne correspond à votre recherche.</div>
    <?php endif; ?>
    <table>
        <thead>
            <tr>

                <th>ID</th>
                <th>Promo</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Coût</th>
                <th width= '300px'>Heures par semaine</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($formation->id); ?></td>
                <td><?php echo e($formation->promo); ?></td>
                <td><?php echo e($formation->nom); ?></td>
                <td><?php echo e($formation->description); ?></td>
                <td><?php echo e($formation->cout); ?> €</td>
                <td><?php echo e($formation->heures_par_semaine); ?> heures</td>
                <td>
                    <form action="<?php echo e(route('formations.destroy', $formation->id)); ?>" method="POST" class="action-form">
                        <a class="btn b1" href="<?php echo e(route('formations.show', $formation->id)); ?>">
                            Afficher
                        </a>

                        <a class="btn b2" href="<?php echo e(route('formations.edit', $formation->id)); ?>">
                            Modifier
                        </a>

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn b3">
                            Supprimer
                        </button>
                    </form>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7">Aucune formation disponible.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo e($formations->links()); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/formations/index.blade.php ENDPATH**/ ?>