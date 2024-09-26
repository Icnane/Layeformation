<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
@include('partials.head')
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
    
	@include('partials.sidbar')

    <title>Formations en Art et Design</title>
@vite('resources/css/style.css')
<body>
    <div class="formation-container">
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Design Graphique</h3>
            <p>Apprenez à créer des visuels attrayants pour divers supports, du print au digital.</p>
            <div class="details">Coût: 250F | 40h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Illustration Digitale</h3>
            <p>Découvrez les techniques d'illustration numérique pour créer des œuvres uniques.</p>
            <div class="details">Coût: 300F | 50h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Photographie et Retouche</h3>
            <p>Maîtrisez les bases de la photographie et les techniques de retouche pour sublimer vos images.</p>
            <div class="details">Coût: 200F | 45h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Arts Plastiques</h3>
            <p>Explorez différentes techniques artistiques, allant de la peinture à la sculpture.</p>
            <div class="details">Coût: 280F | 50h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
        <div class="formation">
            <div class="promo">Promo: Néant</div>
            <h3>Mode et Design Textile</h3>
            <p>Apprenez les principes du design de mode et créez vos propres collections textiles.</p>
            <div class="details">Coût: 220F | 35h par semaine</div>
            <a href="{{ route('inscription') }}">
                <button class="inscription-btn">S'inscrire</button>
            </a>
        </div>
    </div>
</body>

@include('components.footer')
</html>