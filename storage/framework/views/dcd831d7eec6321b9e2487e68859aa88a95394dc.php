<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Liste des Chapitres</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="<?php echo e(route('chapitres.create')); ?>">Créer un nouveau chapitre</a>
        </div>

        <form action="<?php echo e(route('chapitres.index')); ?>" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un chapitre" value="<?php echo e(request('search')); ?>">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Module</th>
                <th>Vidéo</th> <!-- Colonne pour la vidéo -->
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $chapitres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapitre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($chapitre->id); ?></td>
                    <td><?php echo e($chapitre->titre); ?></td>
                    <td><?php echo e($chapitre->module->titre); ?></td>

                    <!-- <td>
                        <?php if($chapitre->chemin_video): ?>
                            <video width="150" height="80" controls preload="metadata">
                                <source src="<?php echo e(asset('storage/'.$chapitre->chemin_video)); ?>" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture vidéo.
                            </video>
                            <br>
                            <a href="<?php echo e(asset('storage/'.$chapitre->chemin_video)); ?>" class="btn btn-secondary" download>
                                Télécharger la vidéo
                            </a>
                        <?php else: ?>
                            Aucune vidéo
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="<?php echo e(route('chapitres.destroy', $chapitre->id)); ?>" method="POST" style="display:inline;">
                            <a href="<?php echo e(route('chapitres.show', $chapitre->id)); ?>" class="btn b1">Voir</a>
                            <a href="<?php echo e(route('chapitres.edit', $chapitre->id)); ?>" class="btn b2">Modifier</a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn b3">Supprimer</button>
                        </form>
                    </td> -->
                    <td>
                        <?php if($chapitre->chemin_video): ?>
                            <video width="150" height="100" controls>
                                <source src="<?php echo e(asset('storage/'.$chapitre->chemin_video)); ?>" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture de vidéos.
                            </video>
                            <br>
                            <a href="<?php echo e(asset('storage/' . $chapitre->chemin_video)); ?>" class="btn btn-secondary" download>Télécharger</a>
                        <?php else: ?>
                            Aucune vidéo
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="<?php echo e(route('chapitres.destroy', $chapitre->id)); ?>" method="POST" style="display:inline;">
                            <a href="<?php echo e(route('chapitres.show', $chapitre->id)); ?>" class="btn b1">Voir</a>
                            <a href="<?php echo e(route('chapitres.edit', $chapitre->id)); ?>" class="btn b2">Modifier</a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn b3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chapitre ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/chapitres/index.blade.php ENDPATH**/ ?>