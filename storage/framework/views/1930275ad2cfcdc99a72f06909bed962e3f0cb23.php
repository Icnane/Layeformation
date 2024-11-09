

<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
	<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- </header> -->

	<!--/.list-topics-->
	<!--list-topics end-->

    <?php echo $__env->make('partials.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <!-- </body> -->
	</html>

<?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/home.blade.php ENDPATH**/ ?>