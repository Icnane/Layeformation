<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Liste des Formateurs</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="<?php echo e(route('formateurs.create')); ?>">Créer un nouvel étudiant</a>
        </div>

        <!-- Barre de recherche -->
        <form action="<?php echo e(route('formateurs.index')); ?>" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un étudiant" value="<?php echo e(request()->query('search')); ?>" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    <?php if($noResults): ?>
        <div class="alert alert-warning">Aucun formateur ne correspond à votre recherche.</div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Contact</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $formateurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formateur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($formateur->id); ?></td>
                    <td><?php echo e($formateur->nom); ?></td>
                    <td><?php echo e($formateur->prenom); ?></td>
                    <td><?php echo e($formateur->email); ?></td>
                    <td><?php echo e($formateur->contact); ?></td>
                    <td>
                        <form action="<?php echo e(route('formateurs.destroy', $formateur->id)); ?>" method="POST" class="action-form">
                            <a class="btn b1" href="<?php echo e(route('formateurs.show', $formateur->id)); ?>">Afficher</a>
                            <a class="btn b2" href="<?php echo e(route('formateurs.edit', $formateur->id)); ?>">Modifier</a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn b3">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6">Aucun formateur disponible.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo e($formateurs->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/formateurs/index.blade.php ENDPATH**/ ?>