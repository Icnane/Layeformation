<?php $__env->startSection('content'); ?>
<style>
    .form-background {
        position: absolute;
        background-image: url('<?php echo e(asset('assets/images/WhatsApp_Image_2024-07-05_à_11.11.09_7c7222e6-removebg-preview.png')); ?>');
        background-size: cover;
        background-position: center;
        filter: blur(5px);
        opacity: 0.3;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0;
    }

    .card {
        position: relative;
        z-index: 1;
        background-color: transparent; /* Enlever l'arrière-plan de la carte */
    }

    .card-header, .card-body {
        background-color: rgba(255, 255, 255, 0.8); /* Fond semi-transparent pour la lisibilité */
    }

    .form-control {
        width: 100%; /* Remplir toute la largeur de la colonne */
        padding: 12px; /* Ajouter un peu de rembourrage */
    }

    .button-container {
        display: flex; /* Utiliser flexbox */
        justify-content: space-between; /* Espacer les boutons */
        margin-top: 20px; /* Espacement en haut des boutons */
    }

    .btn-primary {
        margin-right: 10px; /* Espacement à droite du bouton "Login" */
    }

    .btn-link {
        color: #007bff; /* Couleur du lien */
        background-color: #ffc107; /* Couleur différente pour le bouton "Mot de passe oublié" */
        border: none;
        border-radius: 5px;
        padding: 10px 15px; /* Ajout de rembourrage */
    }

    .btn-link:hover {
        background-color: #ffca2d; /* Couleur au survol */
    }
</style>

<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>

<div class="container">
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-8 position-relative">
            <div class="form-background"></div> <!-- Image de fond floue -->
            <div class="card">
                <div class="card-header text-center">
                    <span style="color: black;">LAY</span><span style="color: red;">FORMATION</span>
                </div>

                <div class="card-body">
                    <div class="form-container">
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Email Address')); ?></label>
                                <div class="col-md-8"> <!-- Augmenter la largeur de la colonne -->
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Password')); ?></label>
                                <div class="col-md-8"> <!-- Augmenter la largeur de la colonne -->
                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="remember"><?php echo e(__('Remember Me')); ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="button-container">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Login')); ?></button>
                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn-link" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    <div class="image-container">
                        <img src="<?php echo e(asset('assets/images/9999.png')); ?>" alt="Description" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/auth/login.blade.php ENDPATH**/ ?>