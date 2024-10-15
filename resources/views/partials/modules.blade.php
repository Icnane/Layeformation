<!doctype html>
<html class="no-js" lang="en">
@include('partials.head')

<body>
@include('partials.sidbar')

    <h1 style="text-align: center; padding: 30px;">Les Modules de Formation</h1>

    <section class="top-area" style="padding-top: 150px;">
        <div class="clearfix"></div>
        <section id="list-modules" class="list-modules">
            <div class="container">
                <div class="list-modules-content">
                    @if($modules->isEmpty())
                        <p>Aucun module disponible.</p>
                    @else
                        <ul>
                            @foreach($modules as $module)
                                <li>
                                    <div class="single-list-modules-content">
                                        <div class="single-list-modules-icon">
                                            <img src="{{ asset('storage/' . $module->image) }}" alt="{{ $module->title }}" style="height: 50px; margin-right: 10px;">
                                        </div>
                                        <h2><a href="{{ route('modules.show', $module->id) }}">{{ $module->title }}</a></h2>
                                        <i>
                                            <a href="{{ route('modules.show', $module->id) }}">
                                                <input type="button" value="Voir Plus...">
                                            </a>
                                        </i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div><!--/.container-->
        </section>
    </section>

    @include('components.footer')
</body>
</html>
