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
     <?php echo app('Illuminate\Foundation\Vite')('resources/css/styles.css'); ?>
	
     <div class="about-container">
        <h1>À Propos de LAYFORMATION</h1>
        <p>Bienvenue sur LAYFORMATION, votre destination de confiance pour des formations de qualité en ligne et en présentiel dans divers domaines. Nous sommes engagés à fournir des cours accessibles et pratiques pour vous aider à atteindre vos objectifs professionnels et personnels.</p>

        <div class="founder-section">
            <img src="assets/images/blog/img.png" alt="Fondateur de LAYFORMATION">
            <h2>Message du Fondateur</h2>
            <p>Bonjour, je suis Germaine, la créatrice de LAYFORMATION. Notre équipes a pour objectif de vous offrir une plateforme d'apprentissage enrichissante qui non seulement élargit vos compétences, mais qui vous aide aussi à vous développer en tant que professionnel. Merci de faire partie de notre communauté d'apprenants.</p>
        </div>

        <div class="mission-section">
            <h2>Notre Mission</h2>
            <p>Notre mission est de rendre l'éducation accessible à tous, en proposant des cours en ligne de haute qualité, couvrant un large éventail de sujets essentiels pour le développement professionnel et personnel. Nous croyons que l'apprentissage est un droit fondamental et nous nous efforçons de fournir les meilleurs outils et ressources pour vous permettre de réussir.</p>
        </div>

        <div class="values-section">
            <h2>Nos Valeurs</h2>
            <ul>
                <li>Accessibilité : Nous rendons l'éducation accessible à tous.</li>
                <li>Qualité : Nous garantissons des contenus de formation de haute qualité.</li>
                <li>Innovation : Nous restons à la pointe de la technologie éducative.</li>
                <li>Communauté : Nous favorisons un environnement d'apprentissage collaboratif et solidaire.</li>
            </ul>
        </div>
    </div>


    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <!-- </body> -->
	</html><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/partials/apropos.blade.php ENDPATH**/ ?>