<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pending Quizzes</title>
</head>

<body>

    <h1>Pending Quizzes</h1>

    @foreach ($quizzes as $quiz)
        <div>

            <h2>{{ $quiz->name }}</h2>
            <img src="{{ $quiz->picture }}" alt="{{ $quiz->name }}" style="height: 25%; width: 25%">
            <p>Number of questions: {{ $quiz->questions->count() }}</p>

            @if (Auth::check() && Auth::id() === 1)
            <form action="{{ route('quizzes.publish', $quiz) }}" method="post">
                @csrf
                <button type="submit">Publish Quiz</button>
            </form>
            @endif

            <form action="{{ route('quizzes.destroy', $quiz) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Quiz</button>
            </form>
        </div>
    @endforeach

</body>