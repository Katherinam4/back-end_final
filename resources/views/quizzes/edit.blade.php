<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit quiz</title>
</head>

<body>

    <h1>Edit Quiz</h1>

    <form action="{{ route('quizzes.update', $quiz) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $quiz->name }}">
        </div>

        <div>
            <label for="picture">Picture</label>
            <input type="text" name="picture" value="{{ $quiz->picture }}">
        </div>

        <div>
            <label for="description">Description</label>
            <label>
                <textarea name="description">{{ $quiz->description }}</textarea>
            </label>
        </div>

        <button type="submit">Update Quiz</button>
    </form>

</body>
</html>