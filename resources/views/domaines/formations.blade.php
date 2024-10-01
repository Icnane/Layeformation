<!doctype html>
<html class="no-js" lang="en">

@include('partials.head')

<body>
    <!--header-top start -->
    @include('partials.sidbar')
    @vite('resources/css/styles.css')
    @vite('resources/css/style.css')

    <h1 style="text-align: center; padding: 30px;">Formations dans le Domaine: {{ $domaine->nom }}</h1>

    <section class="top-area" style="padding-top: 150px;">
        <div class="clearfix"></div>
        <section id="list-formations" class="list-formations">
            <div class="container">
                <div class="list-formations-content">
                    @foreach($formations as $formation)
                        <div class="formation">
                            <div class="promo">Promo: {{ $formation->promo ?? 'Néant' }}</div>
                            <h3>{{ $formation->nom }}</h3>
                            <p>{{ $formation->description }}</p>
                            <div class="details">Coût: {{ $formation->cout }} | {{ $formation->durée ?? 'Durée inconnue' }}</div>
                            <a href="{{ route('inscription') }}">
                                <button class="inscription-btn">S'inscrire</button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div><!--/.container-->
        </section>
    </section>

    @include('components.footer')
</body>
</html>
