<?php $__env->startSection('content'); ?>
<div class="card1">
    <div class="card-header">Modifier le Module</div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('modules.update', $module->id)); ?>" method="POST" class="form-container">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="id">ID :</label>
            <input type="number" name="id" class="form-control" value="<?php echo e($module->id); ?>" required readonly>
        </div>

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" class="form-control" value="<?php echo e(old('titre', $module->titre)); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" class="form-control"><?php echo e(old('description', $module->description)); ?></textarea>
        </div>

        <div class="form-group">
            <label for="formation_id">Formation :</label>
            <select name="formation_id" class="form-control" required>
                <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($formation->id); ?>" <?php echo e($formation->id == $module->formation_id ? 'selected' : ''); ?>>
                        <?php echo e($formation->nom); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à Jour</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/modules/edit.blade.php ENDPATH**/ ?>