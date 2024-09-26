<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
@include('partials.head')
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
    
	@include('partials.sidbar')
<title>Formations en Administration et des Affaires</title>
@vite('resources/css/style.css')
<body>
    <div class="formation-container">
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Gestion des Projets</h3>
            <p>Apprenez à planifier, exécuter et superviser des projets pour garantir leur succès.</p>
            <div class="details">Coût: 250F | 40h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Marketing Digital</h3>
            <p>Découvrez les stratégies et outils de marketing digital pour promouvoir efficacement votre entreprise.</p>
            <div class="details">Coût: 300F | 50h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Comptabilité et Gestion Financière</h3>
            <p>Maîtrisez les principes de la comptabilité et de la gestion financière pour prendre des décisions éclairées.</p>
            <div class="details">Coût: 200F | 45h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Droit des Affaires</h3>
            <p>Comprenez les aspects juridiques des affaires pour naviguer dans le monde commercial en toute sécurité.</p>
            <div class="details">Coût: 280F | 50h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Leadership et Management</h3>
            <p>Développez vos compétences en leadership pour gérer efficacement des équipes et des organisations.</p>
            <div class="details">Coût: 220F | 35h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
    </div>
</body>

@include('components.footer')
</html>