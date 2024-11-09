@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Éditer le Quiz : {{ $quiz->titre }}</div>
    <div class="card-body">
        <form action="{{ route('quiz.update', $quiz->id) }}" method="POST" id="quiz-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre">Titre du Quiz</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ $quiz->titre }}" required>
            </div>

            <div class="form-group">
                <label for="chapitre_id">Chapitre associé</label>
                <select name="chapitre_id" id="chapitre_id" class="form-control" required>
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}" {{ $quiz->chapitre_id == $chapitre->id ? 'selected' : '' }}>
                            {{ $chapitre->titre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="questions-container">
                <h5>Questions du Quiz</h5>
                @foreach($quiz->questions as $index => $question)
                    <div class="question-block" id="question-block-{{ $index }}">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea name="questions[{{ $index }}][text]" class="form-control question-text" rows="2" required>{{ $question->text }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Type de question</label>
                            <select name="questions[{{ $index }}][type]" class="form-control question-type" onchange="toggleOptions(this, {{ $index }})">
                                <option value="multiple" {{ $question->type == 'multiple' ? 'selected' : '' }}>Choix multiples</option>
                                <option value="true_false" {{ $question->type == 'true_false' ? 'selected' : '' }}>Vrai/Faux</option>
                            </select>
                        </div>
                        <div class="options-container">
                            <label>Options</label>
                            @foreach($question->options as $option)
                                <input type="text" name="questions[{{ $index }}][options][]" class="form-control" value="{{ $option }}" required>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" class="btn btn-success" id="add-question" onclick="addQuestion()">Ajouter une question</button>
            <button type="submit" class="btn btn-primary" id="submit-button" style="margin-top: 10px;">Sauvegarder le quiz</button>
        </form>
    </div>
</div>

<script>
    let questionIndex = {{ count($quiz->questions) }}; // Initialiser avec le nombre de questions existantes

    function addQuestion() {
        if (questionIndex < 10) {
            const container = document.getElementById('questions-container');
            const newQuestionBlock = document.createElement('div');
            newQuestionBlock.className = 'question-block';
            newQuestionBlock.id = 'question-block-' + questionIndex;
            newQuestionBlock.innerHTML = `
                <div class="form-group">
                    <label for="question">Question</label>
                    <textarea name="questions[${questionIndex}][text]" class="form-control question-text" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="type">Type de question</label>
                    <select name="questions[${questionIndex}][type]" class="form-control question-type" onchange="toggleOptions(this, ${questionIndex})">
                        <option value="multiple">Choix multiples</option>
                        <option value="true_false">Vrai/Faux</option>
                    </select>
                </div>
                <div class="options-container">
                    <label>Options</label>
                    <input type="text" name="questions[${questionIndex}][options][]" class="form-control" placeholder="Option 1" required>
                    <input type="text" name="questions[${questionIndex}][options][]" class="form-control" placeholder="Option 2" required>
                </div>
            `;
            container.appendChild(newQuestionBlock);
            questionIndex++;

            // Si 10 questions, cacher le bouton d'ajout et montrer le bouton de sauvegarde
            if (questionIndex === 10) {
                document.getElementById('submit-button').style.display = 'inline-block';
                document.getElementById('add-question').style.display = 'none';
            }
        }
    }

    function toggleOptions(selectElement, index) {
        const optionsContainer = selectElement.closest('.question-block').querySelector('.options-container');
        if (selectElement.value === 'true_false') {
            optionsContainer.innerHTML = `
                <label>Options</label>
                <input type="text" name="questions[${index}][options][]" class="form-control" value="Vrai" readonly>
                <input type="text" name="questions[${index}][options][]" class="form-control" value="Faux" readonly>
            `;
        } else {
            optionsContainer.innerHTML = `
                <label>Options</label>
                <input type="text" name="questions[${index}][options][]" class="form-control" placeholder="Option 1" required>
                <input type="text" name="questions[${index}][options][]" class="form-control" placeholder="Option 2" required>
            `;
        }
    }
</script>
@endsection
