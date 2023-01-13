<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Quizzes</title>
</head>

<body>

    <div style="display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('quizzes.create') }}" style="font-size: 15px; color: #335;">Create a new Quiz</a>
        <a href="{{ route('quizzes.pending') }}" style="font-size: 14px; color: #335;">All/pending Quizzes</a>
        <a href="{{ route('questions.create') }}" style="font-size: 14px; color: #335;">Create a Question</a>
        <a href="{{ route('questions.all') }}" style="font-size: 14px; color: #335;">All Question</a>

    </div>
    @foreach ($quizzes as $key => $quiz)
    <div>
        <a href="{{ route('quizzes.show', $quiz->id) }}">
            <h2>{{ $key + 1 }}. {{ $quiz->name }}</h2>
            <img src="{{ $quiz->picture }}" alt="{{ $quiz->name }}" style="height: 30%; width: 30%">
            <p>Number of questions: {{ $quiz->questions->count() }}</p>
        </a>
    </div>
@endforeach


</body>