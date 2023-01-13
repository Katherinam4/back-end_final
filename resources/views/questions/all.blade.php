<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Questions</title>

</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Quiz</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ $question->question }}</td>
                <td>
                    <form action="{{ route('question.update', ['id' => $question->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <select name="quiz_id">
                            @foreach($quiz as $quiz)
                            <option value="{{ $quiz->id }}"
                                @if($question->quiz_id === $quiz->id)
                                    selected
                                @endif
                            >
                                {{ $quiz->name }}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>