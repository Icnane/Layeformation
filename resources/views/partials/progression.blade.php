<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.sidebar')

    <div class="container">
        <h1>Résultat du Quiz</h1>
        <p>Votre score : {{ $percentage }}%</p>
        <p>{{ $message }}</p>
        <a href="{{ route('quiz.index') }}" class="btn btn-primary">Retourner aux quizzes</a>
    </div>

    @include('components.footer')
</body>

</html>
