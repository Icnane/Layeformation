<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
    
	<?php echo $__env->make('partials.sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- </header> -->
   

    <?php echo app('Illuminate\Foundation\Vite')('resources/css/styles.css'); ?>

<section class="top-area" style="padding-top: 50px;">
    <h1 style="text-align: center; padding: 30px; font-size: 30px;">BESOIN DE NOUS CONTACTER</h1>

    <div class="con-container">
        <div class="text-section">
            <div class="platform-title">
                <span class="lay">LAY</span><span class="formation">FORMATION</span>
            </div>
            <p style="font-size: 20px;"><b>Bienvenue sur LAYFORMATION, votre plate-forme de formation en ligne dédiée à l'apprentissage et à l'amélioration continue. Nous proposons une gamme variée de formations dans des domaines clés tels que l'informatique, le marketing digital, l'énergie, et bien plus encore. Notre objectif est de vous fournir les outils et les connaissances nécessaires pour exceller dans votre carrière professionnelle.</b></p>
            <p style="font-size: 20px;"><b>Notre équipe d'experts est là pour vous guider à chaque étape de votre apprentissage. Que vous soyez un professionnel cherchant à se perfectionner ou un débutant enthousiaste, nous avons des cours adaptés à vos besoins. Rejoignez-nous et commencez à transformer votre avenir dès aujourd'hui !</b></p>
        </div>

        <!-- Ligne rouge transparente -->
        <div class="divider"></div>

        <div class="contact-form-section">
            <div class="contact-info">
                <h2>Nos Contacts</h2>
                <p><img src="assets/images/73552.png" alt="" width="20px" height="10px">Téléphone : <a href="tel:+22654141142">+22654141142</a></p>
                <p><img src="assets/images/télécharger.png" alt="" width="30px" height="10px">Email : <a href="mailto:benikin2004@gmail.com">benikin2004@gmail.com</a></p>
                <p><img src="assets/images/12513324.png" alt="" width="30px" height="10px">Position GPS : <a href="https://www.google.com/maps?q=12.364,-1.5336" target="_blank">12.364,-1.5336</a></p>
            </div>

            <div class="contact-form">
                <h2>Envoyer un Message</h2>
                <form action="#" method="post">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</section>



    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <!-- </body> -->
	</html><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/partials/contact.blade.php ENDPATH**/ ?>