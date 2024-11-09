<!doctype html>
<html class="no-js" lang="en">

<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <style>
       

        .form-group {
            width: 100%; 
            max-width: 400px; 
            margin-bottom: 15px; 
        }

        .form-control {
            width: 100%;
        }
    </style>



    

    <div class="container">
        <h2>Éditer mon profil</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('editprofil.update')); ?>" method="POST"> <!-- Route mise à jour -->
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?> <!-- Pour envoyer les données de mise à jour -->

            <!-- Prénom -->
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom"
                    value="<?php echo e(old('prenom', $user->prenom)); ?>" required>
            </div>

            <!-- Nom -->
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom"
                    value="<?php echo e(old('nom', $user->nom)); ?>" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo e(old('email', $user->email)); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
        </form>
    </div>

    

<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/partials/editprofil.blade.php ENDPATH**/ ?>