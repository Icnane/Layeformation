@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>{{ $quiz->titre }}</h4>
            <p>Module : {{ $quiz->module->titre }} | Chapitre : {{ $quiz->chapitre->titre }}</p>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" id="start-quiz-btn" onclick="startQuiz()">Commencer le Quiz</button>
            
            <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" id="quiz-form" style="display: none;">
                @csrf
                <div id="questions-container">
                    @foreach($quiz->questions as $index => $question)
                        <div class="question-block mb-4">
                            <h5>Question {{ $index + 1 }}: {{ $question->text }}</h5>
                            @if($question->type === 'multiple')
                                @foreach($question->options as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                                        <label class="form-check-label">{{ $option->text }}</label>
                                    </div>
                                @endforeach
                            @elseif($question->type === 'true_false')
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="1" required>
                                    <label class="form-check-label">Vrai</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="0" required>
                                    <label class="form-check-label">Faux</label>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-success mt-3">Soumettre le Quiz</button>
            </form>
        </div>
    </div>
</div>

<script>
    function startQuiz() {
        document.getElementById('start-quiz-btn').style.display = 'none';
        document.getElementById('quiz-form').style.display = 'block';
    }
</script>
@endsection
