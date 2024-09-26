<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
@include('partials.head')
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
    
	@include('partials.sidbar')
    @vite('resources/css/styles.css')
    @vite('resources/css/style.css')
    <title>Formations en Informatique</title>

<body>
    <div class="formation-container">
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Développement Web</h3>
            <p>Apprenez à créer des sites web dynamiques en utilisant les dernières technologies comme HTML, CSS, JavaScript et PHP.</p>
            <div class="details">Coût: 200F | 40h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Data Science et Analyse de Données</h3>
            <p>Maîtrisez les techniques d'analyse de données, de visualisation et de machine learning avec Python et R.</p>
            <div class="details">Coût: 250F | 60h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>CyberSécurité</h3>
            <p>Apprenez à protéger les systèmes d'information et à prévenir les cyberattaques grâce à des techniques avancées de sécurité.</p>
            <div class="details">Coût: 300F | 50h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Formation en Intelligence Artificielle</h3>
            <p>Explorez les concepts fondamentaux de l'IA et apprenez à construire des modèles d'apprentissage automatique.</p>
            <div class="details">Coût: 280F | 55h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Gestion de Projet Informatique</h3>
            <p>Apprenez les meilleures pratiques de gestion de projet pour réussir vos projets technologiques.</p>
            <div class="details">Coût: 220F | 30h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
    </div>
</body>

@include('components.footer')
</html>