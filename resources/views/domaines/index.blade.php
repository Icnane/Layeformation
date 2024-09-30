<!doctype html>
<html class="no-js" lang="en">

@include('partials.head')

<body>
    @include('partials.sidbar')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @vite('resources/css/styles.css')

    <h1 style="text-align: center; padding: 30px;">Les Domaines de Formations</h1>

    <section class="top-area" style="padding-top: 150px;">
        <div class="clearfix"></div>
        <section id="list-topics" class="list-topics">
            <div class="container">
                <div class="list-topics-content">
                    <ul>
                        @foreach($domaines as $domaine)
                            <li>
                                <div class="single-list-topics-content">
                                    <div class="single-list-topics-icon">
                                        <img src="{{ asset('storage/' . $domaine->logo) }}" alt="{{ $domaine->nom }}" style="height: 50px; margin-right: 10px;">
                                    </div>
                                    <h2><a href="{{ route('domaines.show', $domaine->id) }}">{{ $domaine->nom }}</a></h2>
                                    <i>
                                        <a href="{{ route('domaines.show', $domaine->id) }}">
                                            <input type="button" value="Voir plus...">
                                        </a>
                                    </i>
                                </div>
                                {{-- <div class="formations-list">
                                    <h3>Formations Associées:</h3>
                                    <ul>
                                        @foreach($domaine->formations as $formation)
                                            <li>
                                                <a href="{{ route('formations.show', $formation->id) }}">{{ $formation->nom }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div><!--/.container-->
        </section>
    </section>

    @include('components.footer')
</body>
</html>
