<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
	<?php echo $__env->make('partials.sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- </header> -->
     <!-- Inclure le fichier CSS via Vite -->
     
     <?php echo app('Illuminate\Foundation\Vite')('resources/css/style.css'); ?>
     <?php echo app('Illuminate\Foundation\Vite')('resources/css/styles.css'); ?>

    <h1 style="text-align: center; padding: 30px;">Formations dans le Domaine: <?php echo e($domaine->nom); ?></h1>

    <section class="top-area" style="padding-top: 150px;">
        <div class="clearfix"></div>
        <section id="list-formations" class="list-formations">
            <div class="container">
                <div class="list-formations-content">
                    <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="formation">
                            <div class="promo">Promo: <?php echo e($formation->promo ?? 'Néant'); ?></div>
                            <h3><?php echo e($formation->nom); ?></h3>
                            <p><?php echo e($formation->description); ?></p>
                            <div class="details">Coût: <?php echo e($formation->cout); ?> | <?php echo e($formation->durée ?? 'Durée inconnue'); ?></div>
                            <a href="<?php echo e(route('inscription')); ?>">
                                <button class="inscription-btn">S'inscrire</button>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <!-- </body> -->
	</html><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/domaines/formations.blade.php ENDPATH**/ ?>