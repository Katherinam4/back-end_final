<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Quiz Questions</title>
</head>
<body>
    <h1>Create Quiz Question</h1>


    <form action="{{ route('questions.store') }}" method="post">
        @csrf

        <div>
            <label for="question">Question</label>
            <input type="text" name="question" value="{{ old('question') }}">
        </div>

        <div>
            <label for="picture">Picture</label>
            <input type="text" name="picture" value="{{ old('picture') }}">
        </div>

        <div>
            <label for="firstAnswer">Answer 1</label>
            <input type="text" name="firstAnswer" value="{{ old('firstAnswer') }}">
        </div>

        <div>
            <label for="secondAnswer">Answer 2</label>
            <input type="text" name="secondAnswer" value="{{ old('secondAnswer') }}">
        </div>

        <div>
            <label for="thirdAnswer">Answer 3</label>
            <input type="text" name="thirdAnswer" value="{{ old('thirdAnswer') }}">
        </div>

        <div>
            <label for="fourthAnswer">Answer 4</label>
            <input type="text" name="fourthAnswer" value="{{ old('fourthAnswer') }}">
        </div>

        <div>
            <label for="position">Position</label>
            <input type="number" name="position" value="{{ old('position') }}">
        </div>

        <div>
            <label for="correctAnswer">Correct Answer</label>
            <input type="number" name="correctAnswer" value="{{ old('correctAnswer') }}">
        </div>

            <div>
                <label for="quiz_id">Quiz</label>
                <label>
                    <select name="quiz_id">
                        @foreach ($quiz as $quiz)
                            <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

        <button type="submit">Create Question</button>
    </form>
</body>
</html>