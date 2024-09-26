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
                        <li><a href="{{ route('welcome') }}">Accueil</a></li>
                        <li><a href="{{ route('formation') }}">Formation</a></li>
                        <li><a href="{{ route('inscription') }}">Inscription</a></li>
                        <li><a href="{{ route('apropos') }}">À propos de nous</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
						<!-- Vérification si l'utilisateur a le rôle 'Admin' -->
						@if(Auth::check() && Auth::user()->role === 'Admin')
							<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
						@endif
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

	</footer>