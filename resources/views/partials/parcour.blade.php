<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
@include('partials.head')
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
    
	@include('partials.sidbar')
    @vite('resources/css/style.css')
<!-- /.top-area-->
	<!-- top-area End -->
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
        }

        /* Style du contenu principal */
        .content {
            padding: 20px;
        }

        .content h2 {
            margin-top: 0;
            color: #d25800;
        }

        .course-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .course-card img {
            border-radius: 8px;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .course-info {
            flex-grow: 1;
            margin-left: 20px;
        }

        .course-info h3 {
            margin-top: 0;
        }

        .course-actions {
            text-align: right;
        }

        .course-actions button {
            background-color: #d2002e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .course-actions button:hover {
            background-color: #0044a3;
        }

        /* Style du pied de page */
        .footer {
            background-color: #f4f4f4;
            padding: 10px 20px;
            text-align: center;
            font-size: 14px;
            color: #555;
            border-top: 1px solid #ddd;
        }

        /* Styles des sections vides */
        .empty-section {
            text-align: center;
            padding: 50px;
            color: #777;
        }
    </style>
</head>
<body>

    <!-- Contenu principal -->
    <div class="content" id="apprentissage">
        <h2>Mon apprentissage</h2>
        <br>
        <br>
        
        <div class="course-card">
            <img src="https://via.placeholder.com/100" alt="Course Image">
            <div class="course-info">
                <h3>Fondamentaux de l'IA Google</h3>
                <p>Vous avez besoin de plus de temps pour terminer ce cours ? Repoussez votre date de fin souhaitée au 14/9/2024 PDT pour atteindre votre objectif.</p>
            </div>
            <div class="course-actions">
            <div class="course-actions">
    <a href="{{ route('partials.modules') }}" class="btn btn-primary">Commencer</a>
   
       </div>
                <p><a href="#">Repousser la date de fin</a></p>
            </div>
        </div>
        <div class="course-card">
            <h4>Suivi des objectifs hebdomadaires</h4>
            <p>Les apprenants qui se fixent des objectifs ont 75 % de chances de terminer leurs cours. Fixez-vous un objectif hebdomadaire dès maintenant pour prendre en charge votre parcours d'apprentissage et favoriser votre réussite !</p>
            <button>Définissez votre objectif hebdomadaire</button>
        </div>
    </div>

    <div class="content empty-section" id="diplomes" style="display:none;">
        <h2>Diplômes en ligne</h2>
        <p>Cette section est actuellement vide.</p>
    </div>

    <div class="content empty-section" id="recherche" style="display:none;">
        <h2>Rechercher des carrières</h2>
        <p>Cette section est actuellement vide.</p>
    </div>

    <script>
        function showSection(section) {
            document.getElementById('apprentissage').style.display = 'none';
            document.getElementById('diplomes').style.display = 'none';
            document.getElementById('recherche').style.display = 'none';
            document.getElementById(section).style.display = 'block';
        }
    </script>
<!--footer start-->
@include('components.footer')
</body>
</html>