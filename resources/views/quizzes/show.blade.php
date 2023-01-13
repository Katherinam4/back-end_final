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
    <p>Number of questions: {{ $quiz->questions->count() }}</p>

    <img src="{{ $quiz->picture }}" alt="{{ $quiz->name }}" style="height: 30%; width: 30%">

    <form action="{{ route('quizzes.attempt', ['quiz' => $quiz]) }}" method="post">
        @csrf
        <button type="submit">Start quiz</button>
    </form>


    @if (Auth::check() && Auth::id() === 1)
    <form action="{{ route('quizzes.publish', $quiz) }}" method="post">
        @csrf
        <button type="submit">Publish Quiz</button>
    </form>
    @endif


    <a href="{{ route('quizzes.edit', $quiz) }}">Edit Quiz</a>

</body>