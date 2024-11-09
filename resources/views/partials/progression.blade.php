<!doctype html>
<html class="no-js" lang="en">


@include('partials.head')
@vite('resources/css/styles.css')
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
    @include('partials.sidbar')

    <!-- Contenu principal -->
    <div class="content" id="apprentissage">
        <h2>Mon apprentissage</h2>
        <nav class="nav-menu">
            <ul class="menu">
                <li><a href="{{ route('progression') }}">Progression</a></li>
                <li><a href="{{ route('mescours') }}">Mes Cours</a></li>
                <li><a href="#" onclick="showSection('mes-paiements')">Mes Paiements</a></li>
                <li><a href="#" onclick="showSection('mes-certificats')">Mes Certificats et Attestations</a></li>
            </ul>
        </nav>
        <br><br><br><br>  
  


<body>
    <div class="container">
        <h1>Résultat du Quiz</h1>
        <p>Votre score : {{ $poucentage }}%</p>
        <p>{{ $message }}</p>
        <a href="{{ route('quiz.index') }}" class="btn btn-primary">Retourner aux quizzes</a>
    </div>

</body>

@include('components.footer')
</html>
