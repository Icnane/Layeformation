<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
@include('partials.head')
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
    
	@include('partials.sidbar')
<title>Formations en Énergie et Environnement</title>
@vite('resources/css/styles.css')
@vite('resources/css/style.css')
<body>
    <div class="formation-container">
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Énergies Renouvelables</h3>
            <p>Apprenez à concevoir et à gérer des systèmes utilisant des sources d'énergie renouvelables telles que le solaire et l'éolien.</p>
            <div class="details">Coût: 200F | 40h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Gestion des Ressources Naturelles</h3>
            <p>Maîtrisez les techniques de gestion durable des ressources naturelles pour préserver l'environnement.</p>
            <div class="details">Coût: 250F | 60h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Impact Environnemental et Développement Durable</h3>
            <p>Analysez l'impact environnemental des projets et apprenez à intégrer des pratiques durables.</p>
            <div class="details">Coût: 300F | 50h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Techniques de Réduction des Déchets</h3>
            <p>Formez-vous aux méthodes de réduction et de gestion des déchets pour un avenir plus propre.</p>
            <div class="details">Coût: 280F | 55h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Changement Climatique et Politique Énergétique</h3>
            <p>Explorez les enjeux du changement climatique et les politiques nécessaires pour y faire face.</p>
            <div class="details">Coût: 220F | 30h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
    </div>
</body>

@include('components.footer')
</html>