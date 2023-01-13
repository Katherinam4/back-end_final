@foreach ($questions as $question)
    <form method="POST" action="{{ route('questions.move', $question) }}">
        @csrf
        @method('PUT')

        {{ $question->question }}

        <select name="quiz_id">
            @foreach (\App\Models\Quiz::all() as $quiz)
                <option value="{{ $quiz->id }}" {{ $question->quiz_id == $quiz->id ? 'selected' : '' }}>
                    {{ $quiz->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Move</button>
    </form>
@endforeach