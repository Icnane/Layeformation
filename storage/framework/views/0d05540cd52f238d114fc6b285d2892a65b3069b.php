<footer id="footer" class="footer">
		<div class="container">
			<div class="footer-menu">
				<div class="row">
					<div class="col-sm-3">
						<div class="navbar-header">
							<a class="navbar-brand" href="index.html">LAY<span>FORMATION</span></a>
						</div><!--/.navbar-header-->
					</div>
					<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
                        <li><a href="<?php echo e(route('formation')); ?>">Formation</a></li>
                        <li><a href="<?php echo e(route('inscription')); ?>">Inscription</a></li>
                        <li><a href="<?php echo e(route('apropos')); ?>">À propos de nous</a></li>
                        <li><a href="<?php echo e(route('blog')); ?>">Blog</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
						<!-- Vérification si l'utilisateur a le rôle 'Admin' -->
						<?php if(Auth::check() && Auth::user()->role === 'admin'): ?>
							<li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
						<?php endif; ?>
                    </ul><!--/.nav -->
                </div>
				</div>
			</div>
			<div class="hm-footer-copyright">
				<div class="row">
					<div class="col-sm-5">
						<p>
							&copy;copyright. designed and developed by <a
								href="https://www.themesine.com/">themesine</a>
						</p><!--/p-->
					</div>
					<div class="col-sm-7">
						<div class="footer-social">
							<span><i class="fa fa-phone"> +1 (222) 777 8888</i></span>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
				</div>

			</div><!--/.hm-footer-copyright-->
		</div><!--/.container-->

		<div id="scroll-Top">
			<div class="return-to-top">
				<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title=""
					data-original-title="Back to Top" aria-hidden="true"></i>
			</div>

		</div><!--/.scroll-Top-->
		<script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootsnav.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/slick.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
	<!-- Autres scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Ton script personnalisé -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>

<!-- jQuery -->
<script src="<?php echo e(asset('https://code.jquery.com/jquery-3.5.1.slim.min.js')); ?>"></script>
<!-- Popper.js -->
<script src="<?php echo e(asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js')); ?>"></script>
<!-- Bootstrap JS -->
<script src="<?php echo e(asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')); ?>"></script>

	</footer>
<?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/components/footer.blade.php ENDPATH**/ ?>