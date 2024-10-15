<html>
<head>
    <base href="https://layformation-dashboard.com/">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/formations.css') }}">
    <title>Tableau de bord LAYFORMATION</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Ajoutez ici vos styles personnalisés si nécessaire */
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">LAYFORMATION</div>

            <div class="nav-item" data-target="dashboard">
                <a href="{{ route('dashboard') }}" style="color: inherit; text-decoration: none;">Tableau de bord</a>
            </div>
            <div class="nav-item" data-target="courses">
                <a href="{{ route('formations.index') }}" style="color: inherit; text-decoration: none;">Cours</a>
            </div>
            <div class="nav-item" data-target="students">
                <a href="{{ route('etudiants.index') }}" style="color: inherit; text-decoration: none;">Étudiants</a>
            </div>
            <div class="nav-item" data-target="trainers">
                <a href="{{ route('formateurs.index') }}" style="color: inherit; text-decoration: none;">Formateurs</a>
            </div>
            <div class="nav-item" data-target="reports">
                <a href="{{ route('domaines.index') }}" style="color: inherit; text-decoration: none;">Domaines</a>
            </div>
            <div class="nav-item" data-target="modules">
                <a href="{{ route('modules.index') }}" style="color: inherit; text-decoration: none;">Modules</a>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>LAYFORMATION</h1>
                <div class="user-info">
                    <div class="user-avatar">H</div>
                </div>
            </div>

            <div>
                @yield('content')
            </div>

            

            <footer>
                <p>&copy; 2023 LAYFORMATION. Tous droits réservés.</p>
            </footer>
        </div>
    </div>
</body>
</html>
