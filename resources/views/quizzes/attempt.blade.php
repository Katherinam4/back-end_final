<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $quiz->name }}</title>
</head>
<body>
    <h1>{{ $quiz->name }}</h1>
<p>{{ $quiz->description }}</p>
<form action="{{ route('quizzes.result', ['quiz' => $quiz]) }}" method="post">
    @csrf

    <div id="questions">

        @foreach ($questions as $question)
            <div class="question" style="display: none">
                <h2>{{ $question->question }}</h2>
                <h3>you are on quesiton {{$question->position}} from {{ $quiz->questions->count() }}</h3>
                <img src="{{ $question->picture }}" alt="{{ $question->question }}" style="height: 25%; width: 25%">
                <br>
                <label>
                    <input type="radio" name="answers[{{ $question->question }}]" value="1" onchange="showResult(this, {{ $question->correctAnswer }});" answered='false'>
                    {{ $question->firstAnswer }}
                </label>
                <br>
                <label>
                    <input type="radio" name="answers[{{ $question->question }}]" value="2" onchange="showResult(this, {{ $question->correctAnswer }});" answered='false'>
                    {{ $question->secondAnswer }}
                </label>
                <br>
                <label>
                    <input type="radio" name="answers[{{ $question->question }}]" value="3" onchange="showResult(this, {{ $question->correctAnswer }});" answered='false'>
                    {{ $question->thirdAnswer }}
                </label>
                <br>
                <label>
                    <input type="radio" name="answers[{{ $question->question }}]" value="4" onchange="showResult(this, {{ $question->correctAnswer }});" answered='false'>
                    {{ $question->fourthAnswer }}
                </label>
                <br>
                <span id="result-{{ $question->question }}"></span>
            </div>
        @endforeach

    </div>


    <button type="button" onclick="showPrevQuestion()">Prev</button>
    <button type="button" onclick="showNextQuestion()">Next</button>

    <script>
        var currentQuestionIndex = 0;
        function showResult(radioButton, correctAnswer) {
            var resultSpan = document.getElementById('result-' + radioButton.name.split("[")[1].split("]")[0]);
            if (resultSpan) {
                if (radioButton.value == correctAnswer) {
                resultSpan.innerHTML = 'Correct';
                } else {
                resultSpan.innerHTML = 'Incorrect';
                }
            }
            var radioButtons = document.getElementsByName(radioButton.name);
            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i] != radioButton) {
                    radioButtons[i].disabled = true;
                }
            }
        }
        function showPrevQuestion() {
            var questions = document.getElementsByClassName('question');
            if (currentQuestionIndex > 0) {
                questions[currentQuestionIndex].style.display = 'none';
                currentQuestionIndex--;
                questions[currentQuestionIndex].style.display = 'block';
            }
        }
        function showNextQuestion() {
            var questions = document.getElementsByClassName('question');
            if (currentQuestionIndex < questions.length - 1) {
                questions[currentQuestionIndex].style.display = 'none';
                currentQuestionIndex++;
                questions[currentQuestionIndex].style.display = 'block';
            }
        }
        document.getElementsByClassName('question')[0].style.display = 'block';
    </script>

    <button type="submit">Submit answers</button>
</form>

</body>
</html>