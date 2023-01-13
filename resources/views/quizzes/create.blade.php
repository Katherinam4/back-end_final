<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Quiz</title>
</head>

<body>
    <h1>Create a Quiz</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('quizzes.store') }}" method="post">
        @csrf

        <div>
            <label for="name">Quiz Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="picture">Quiz Picture</label>
            <input type="text" name="picture" id="picture">
        </div>

        <div>
            <label for="description">Quiz Description</label>
            <textarea name="description" id="description"></textarea>
        </div>

        <div>
            <input type="hidden" name="author_id" value="{{ Auth::id() }}">
        </div>

        <div>
            <input type="submit" value="Create Quiz">
        </div>

    </form>
</body>