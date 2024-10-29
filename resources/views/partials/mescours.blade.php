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
                @foreach ($modules as $module)
                    <div class="course-card">
                        <h3>{{ $module->titre }}</h3>
                        <p>{{ $module->description }}</p>

                        <h4>Chapitres :</h4>
                        <ul class="chapter-list">
                        @foreach ($module->chapitres as $chapitre)
                                <li>
                                    <strong>Titre :</strong> {{ $chapitre->titre }}<br>
                                    <strong>Description :</strong> {{ $chapitre->description }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

          

@include('components.footer')

</html>