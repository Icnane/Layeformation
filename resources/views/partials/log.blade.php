<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
@include('partials.head')
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
    
	@include('partials.sidbar')
    <title>Formations en Logistique</title>
@vite('resources/css/style.css')
<body>
    <div class="formation-container">
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Gestion de la Chaîne d'Approvisionnement</h3>
            <p>Apprenez à optimiser la gestion des flux de marchandises et des informations.</p>
            <div class="details">Coût: 300F | 40h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Logistique Urbaine</h3>
            <p>Étudiez les défis et solutions pour la gestion logistique dans les villes modernes.</p>
            <div class="details">Coût: 250F | 30h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Transport et Distribution</h3>
            <p>Maîtrisez les techniques de transport et de distribution pour une efficacité maximale.</p>
            <div class="details">Coût: 280F | 35h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Gestion des Stocks</h3>
            <p>Apprenez à gérer les niveaux de stock pour minimiser les coûts et répondre à la demande.</p>
            <div class="details">Coût: 220F | 30h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Logistique Internationale</h3>
            <p>Comprenez les enjeux de la logistique à l'échelle mondiale et les réglementations associées.</p>
            <div class="details">Coût: 350F | 50h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Analyse et Optimisation Logistique</h3>
            <p>Utilisez des outils d'analyse pour améliorer l'efficacité de vos opérations logistiques.</p>
            <div class="details">Coût: 270F | 40h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
    </div>
</body>

@include('components.footer')
</html>