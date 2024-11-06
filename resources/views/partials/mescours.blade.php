<!doctype html>
<html class="no-js" lang="en">

@include('partials.head')
@vite('resources/css/styles.css')
@include('partials.sidbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                <h4>Mes Cours</h4>
                <div id="mes-cours" class="section" style="display:none;">
    <h1>Mes Cours</h1>
    <ul id="moduleList">
        @foreach($modules as $index => $module)
            <li>
                <div class="circle" id="circle{{ $index }}"></div>
                <a href="#" class="sidebar-module" data-module-index="{{ $index }}">{{ $module->titre }}</a>
                <ul class="chapters" id="chapters{{ $index }}">
                    @foreach($module->chapitres as $chapitre)
                        <li>
                            <a href="#" class="chapter" data-module-index="{{ $index }}" data-chapter="{{ $chapitre->id }}">{{ $chapitre->titre }}</a>
                            <div class="chapter-details">
                                <p>Description : {{ $chapitre->description }}</p>

                                <!-- Affichage des vidéos associées au chapitre -->
                                @if($chapitre->videos && $chapitre->videos->isNotEmpty())
                                    <h4>Vidéos :</h4>
                                    @foreach($chapitre->videos as $video)
                                        <video controls width="320" height="240">
                                            <source src="{{ asset('path/to/videos/' . $video->filename) }}" type="video/mp4">
                                            Votre navigateur ne supporte pas la lecture de vidéo.
                                        </video>
                                    @endforeach
                                @else
                                    <p>Aucune vidéo disponible pour ce chapitre.</p>
                                @endif

                            </div>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>

            </div>
        </div>
    </div>
</div>
@endsection

          

@include('components.footer')

</html>