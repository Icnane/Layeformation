<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/styles.css'); ?>
    <style>
        /* Style global */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Style du menu */
        .menu {
            display: flex;
            gap: 20px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            position: relative;
        }

        .menu a {
            text-decoration: none;
            padding: 10px 15px;
            color: #000;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: #d2002e;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            margin-top: 0;
            color: #d25800;
            display: inline-block;
        }

        .nav-menu {
            display: inline-block;
            margin-left: 20px;
        }

        .course-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Style pour la liste des chapitres */
        .chapter-list {
            margin-top: 10px;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <?php echo $__env->make('partials.sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Contenu principal -->
    <div class="content" id="apprentissage">
        <h2>Mon apprentissage</h2>
        <nav class="nav-menu">
            <ul class="menu">
                <li><a href="<?php echo e(route('progression')); ?>">Progression</a></li>
                <li><a href="<?php echo e(route('mescours')); ?>">Mes Cours</a></li>
                <li><a href="#" onclick="showSection('mes-paiements')">Mes Paiements</a></li>
                <li><a href="#" onclick="showSection('mes-certificats')">Mes Certificats et Attestations</a></li>
            </ul>
        </nav>
        <br><br><br><br>

        
        <h4 style="font-size: 36px; color: blue; font-weight: bold;">Bienvenu sur</h4>
        <h4 style="font-size: 36px; color: blue; font-weight: bold;">votre tableau de bord</h4>




    <!-- Autres sections cachées -->
    <div class="content empty-section" id="mes-cours" style="display:none;">
        <h2>Mes Cours</h2>
        <p>Cette section est actuellement vide.</p>
    </div>

    <div class="content empty-section" id="mes-paiements" style="display:none;">
        <h2>Mes Paiements</h2>
        <p>Cette section est actuellement vide.</p>
    </div>

    <div class="content empty-section" id="mes-certificats" style="display:none;">
        <h2>Mes Certificats et Attestations</h2>
        <p>Cette section est actuellement vide.</p>
    </div>

    <script>
        function showSection(section) {
            const sections = ['apprentissage', 'mes-cours', 'mes-paiements', 'mes-certificats'];
            sections.forEach(sec => {
                document.getElementById(sec).style.display = 'none';
            });

            document.getElementById(section).style.display = 'block';
        }
    </script>

    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\Layeformation\resources\views/partials/parcour.blade.php ENDPATH**/ ?>