@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Créer un nouveau Quiz</div>

    <div class="card-body" style="overflow-y: auto; max-height: 500px;"> <!-- Permet de faire défiler les questions -->
        <form action="{{ route('quiz.store') }}" method="POST" id="quiz-form">
            @csrf

            <div class="form-group">
                <label for="titre">Titre du Quiz</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="module_id">Module associé</label>
                <select name="module_id" id="module_id" class="form-control" required>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="chapitre_id">Chapitre associé</label>
                <select name="chapitre_id" id="chapitre_id" class="form-control" required>
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}">{{ $chapitre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div id="questions-container">
                <h5>Questions du Quiz</h5>
                <div class="question-block">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <textarea name="questions[0][text]" class="form-control question-text" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="type">Type de question</label>
                        <select name="questions[0][type]" class="form-control question-type" onchange="toggleOptions(this, 0)">
                            <option value="multiple">Choix multiples</option>
                            <option value="true_false">Vrai/Faux</option>
                        </select>
                    </div>
                    <div class="options-container">
                        <label>Options</label>
                        <input type="text" name="questions[0][options][]" class="form-control" placeholder="Option 1" required>
                        <input type="text" name="questions[0][options][]" class="form-control" placeholder="Option 2" required>
                    </div>
                </div>
            </div>
        </form>

        <button type="button" class="btn btn-success" id="add-question" onclick="addQuestion()">Ajouter une question</button>
        <button type="submit" class="btn btn-primary" id="submit-button" style="display: none; margin-top: 10px;" form="quiz-form">Sauvegarder le quiz</button>
        
        <div id="message" class="mt-3" style="display: none;">
            <strong>Vous avez atteint 10 questions. Veuillez sauvegarder le quiz !</strong>
        </div>
    </div>
</div>

<script>
    let questionIndex = 1;

    function addQuestion() {
        if (questionIndex < 10) {
            const container = document.getElementById('questions-container');
            const newQuestionBlock = document.createElement('div');
            newQuestionBlock.className = 'question-block';
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

            if (questionIndex === 9) {
                document.getElementById('message').style.display = 'block';
                document.getElementById('add-question').style.display = 'none';
                document.getElementById('submit-button').style.display = 'inline';
            }

            questionIndex++;
        }
    }

    function toggleOptions(selectElement, index) {
        const optionsContainer = selectElement.closest('.question-block').querySelector('.options-container');
        optionsContainer.innerHTML = '';  // Vide les anciennes options

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
