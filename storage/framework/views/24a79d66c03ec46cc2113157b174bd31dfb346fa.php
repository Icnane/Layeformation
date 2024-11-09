<!doctype html>
<html class="no-js" lang="en">
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <?php echo $__env->make('partials.sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <h1 style="text-align: center; padding: 30px;">Les Domaines de Formations</h1>

    <section class="top-area" style="padding-top: 150px;">
        <div class="clearfix"></div>
        <section id="list-topics" class="list-topics">
            <div class="container">
                <div class="list-topics-content">
                    <ul>
                        <?php $__currentLoopData = $domaines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domaine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="single-list-topics-content">
                                    <div class="single-list-topics-icon">
                                        <img src="<?php echo e(asset('storage/' . $domaine->logo)); ?>" alt="<?php echo e($domaine->nom); ?>" style="height: 50px; margin-right: 10px;">
                                    </div>
                                    <h2><a href="<?php echo e(route('domaines.show', $domaine->id)); ?>"><?php echo e($domaine->nom); ?></a></h2>
                                    <i>
                                        <a href="<?php echo e(route('domaines.formations', $domaine->id)); ?>"> <!-- Lien vers les formations du domaine -->
                                            <input type="button" value="Voir Formations...">
                                        </a>
                                    </i>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div><!--/.container-->
        </section>
    </section>

    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>







                        
                
            
    <!-- </body> -->

    
 <!-- </body> -->
	
<?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/partials/formation.blade.php ENDPATH**/ ?>