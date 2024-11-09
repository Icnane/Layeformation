<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
	<?php echo $__env->make('partials.sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- </header> -->
	<!-- <body>
     <title>Blog</title>
<!-- Inclure le fichier CSS via Vite -->
<?php echo app('Illuminate\Foundation\Vite')('resources/css/styles.css'); ?>
</head>
<body>
    <!-- Contenu du blog -->
    <main class="blog-container">
        <article class="blog-post">
            <div class="blog-image" style="background-image: url('assets/blog/WhatsApp\ Image\ 2024-08-26\ à\ 15.53.18_1f0efde8.jpg');"></div>
            <div class="blog-content">
                <h2>Les Dernières Tendances en Informatique</h2>
                <p class="date">Publié le 26 août 2024</p>
                <p class="summary">Découvrez les dernières tendances en informatique, de la cybersécurité à l'intelligence artificielle, et comment elles transforment le monde du travail.</p>
                <a href="#" class="read-more">Lire la suite</a>
            </div>
        </article>

        <article class="blog-post">
            <div class="blog-image" style="background-image: url('assets/blog/WhatsApp\ Image\ 2024-08-26\ à\ 15.53.18_5dbef3f0.jpg');"></div>
            <div class="blog-content">
                <h2>Les Meilleures Pratiques en Plomberie</h2>
                <p class="date">Publié le 25 août 2024</p>
                <p class="summary">Un aperçu des meilleures pratiques en plomberie pour garantir des installations durables et efficaces dans tous les projets de construction.</p>
                <a href="#" class="read-more">Lire la suite</a>
            </div>
        </article>

        <article class="blog-post">
            <div class="blog-image" style="background-image: url('assets/blog/i3.avif');"></div>
            <div class="blog-content">
                <h2>Innovations en Électricité pour le Bâtiment</h2>
                <p class="date">Publié le 24 août 2024</p>
                <p class="summary">Explorez les dernières innovations en électricité pour les bâtiments, incluant les technologies d'économie d'énergie et les systèmes intelligents.</p>
                <a href="#" class="read-more">Lire la suite</a>
            </div>
        </article>

        <article class="blog-post">
            <div class="blog-image" style="background-image: url('assets/blog/WhatsApp\ Image\ 2024-08-26\ à\ 15.53.18_5dc6d9fc.jpg');"></div>
            <div class="blog-content">
                <h2>Techniques Modernes de Couture</h2>
                <p class="date">Publié le 23 août 2024</p>
                <p class="summary">Apprenez les techniques modernes de couture pour créer des vêtements à la mode et durables, adaptées aux besoins contemporains.</p>
                <a href="#" class="read-more">Lire la suite</a>
            </div>
        </article>

        <article class="blog-post">
            <div class="blog-image" style="background-image: url('assets/blog/WhatsApp\ Image\ 2024-08-26\ à\ 15.53.18_8f221664.jpg');"></div>
            <div class="blog-content">
                <h2>Apprentissage des Langues Étrangères</h2>
                <p class="date">Publié le 22 août 2024</p>
                <p class="summary">Découvrez les méthodes les plus efficaces pour apprendre des langues étrangères et locales et améliorer vos compétences en communication globale.</p>
                <a href="#" class="read-more">Lire la suite</a>
            </div>
        </article>

        <article class="blog-post">
            <div class="blog-image" style="background-image: url('images/blog/marketing.jpg');"></div>
            <div class="blog-content">
                <h2>Stratégies de Marketing Digital</h2>
                <p class="date">Publié le 21 août 2024</p>
                <p class="summary">Analyse des stratégies de marketing digital les plus efficaces pour accroître la visibilité en ligne et engager votre audience cible.</p>
                <a href="#" class="read-more">Lire la suite</a>
            </div>
        </article>
    </main>


    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <!-- </body> -->
	</html><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/partials/blog.blade.php ENDPATH**/ ?>