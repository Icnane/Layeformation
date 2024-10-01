<html>
    <head>
    <base href="https://layformation-dashboard.com/">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/formations.css') }}">
    <title>Tableau de bord LAYFORMATION</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

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
            {{--
            <div class="nav-item" data-target="reports">
                <a href="{{ route('reports.index') }}" style="color: inherit; text-decoration: none;">Rapports</a>
            </div>

            <div class="nav-item" data-target="settings">
                <a href="{{ route('settings.index') }}" style="color: inherit; text-decoration: none;">Paramètres</a>
            </div> --}}
        </div>

        <div class="main-content">
            <div class="header">
                <h1>LAYFORMATION</h1>
                <div class="user-info">
                    <div class="user-avatar">H</div>
                    <!-- <span>Haidara</span> -->
                </div>
            </div>

           {{--  <div id="dashboard" class="content active">
                 <div class="dashboard-grid">
                    <div class="card">
                        <div class="card-header">Étudiants inscrits</div>
                        <div class="stat">1,234</div>
                        <canvas id="studentsChart"></canvas>
                    </div>
                    <div class="card">
                        <div class="card-header">Cours actifs</div>
                        <div class="stat">42</div>
                        <canvas id="coursesChart"></canvas>
                    </div>
                    <div class="card">
                        <div class="card-header">Taux de complétion</div>
                        <div class="stat">78%</div>
                        <canvas id="completionChart"></canvas>
                    </div>
                    <div class="card">
                        <div class="card-header">Revenus mensuels</div>
                        <div class="stat">15,680 €</div>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div> --}}
                {{-- <div class="card">
                    <div class="card-header">Cours les plus populaires</div>
                    <table>
                        <thead>
                            <tr>
                                <th>Titre du cours</th>
                                <th>Formateur</th>
                                <th>Étudiants</th>
                                <th>Note</th>
                                <th style="width: 100px; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Introduction au Machine Learning</td>
                                <td>Dr. Alice Dubois</td>
                                <td>256</td>
                                <td>4.8/5</td>
                            </tr>
                            <tr>
                                <td>Développement Web Full-Stack</td>
                                <td>Jean Dupont</td>
                                <td>189</td>
                                <td>4.7/5</td>
                            </tr>
                            <tr>
                                <td>Data Science pour débutants</td>
                                <td>Marie Leclerc</td>
                                <td>178</td>
                                <td>4.9/5</td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}

                <div >
                    @yield('content')
                </div>

            </div>
            <footer>
                <p>&copy; 2023 LAYFORMATION. Tous droits réservés.</p>
            </footer>
        </div>
    </div>

</body></html>
