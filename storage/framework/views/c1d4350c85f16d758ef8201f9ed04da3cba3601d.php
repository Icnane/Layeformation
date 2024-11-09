<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Liste des Étudiants</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="<?php echo e(route('inscription')); ?>">Créer un nouvel étudiant</a>
        </div>

        <!-- Barre de recherche -->
        <form action="<?php echo e(route('etudiants.index')); ?>" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un étudiant" value="<?php echo e(request()->query('search')); ?>" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    <?php if($noResults): ?>
        <div class="alert alert-warning">Aucun étudiant ne correspond à votre recherche.</div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Sexe</th>
                <th>Âge</th>
                <th>Formation</th>
                <th>Mode</th>
                <th>Ville</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($etudiant->id); ?></td>
                    <td><?php echo e($etudiant->nom); ?></td>
                    <td><?php echo e($etudiant->prenom); ?></td>
                    <td><?php echo e($etudiant->email); ?></td>
                    <td><?php echo e($etudiant->tel); ?></td>
                    <td><?php echo e($etudiant->sexe); ?></td>
                    <td><?php echo e($etudiant->age); ?></td>
                    <td><?php echo e($etudiant->formation); ?></td>
                    <td><?php echo e($etudiant->mode); ?></td>
                    <td><?php echo e($etudiant->ville); ?></td>
                    <td>
                        <form action="<?php echo e(route('etudiants.destroy', $etudiant->id)); ?>" method="POST" class="action-form boutonms">
                            <a class="btn b1" href="<?php echo e(route('etudiants.show', $etudiant->id)); ?>">
                                Afficher
                            </a>

                            <a class="btn b2" href="<?php echo e(route('etudiants.edit', $etudiant->id)); ?>">
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
                    <td colspan="11">Aucun étudiant disponible.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo e($etudiants->links()); ?>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/etudiants/index.blade.php ENDPATH**/ ?>