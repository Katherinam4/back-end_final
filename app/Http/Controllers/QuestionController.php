<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{


    public function listOfQuestions() {
        if (Auth::id() === 1) {
        $questions = Question::all();
        $quizzes = Quiz::all();
        return view('questions.all', ['questions'=>$questions, "quizzes"=>$quizzes]);
        }
        else{
            return redirect()->route("quizzes.index");
        }
    }


    public function addQuestion() {
        if (auth()->user()->id == 1) {
            $quizzes = Quiz::all();
        } else {
            $quizzes = Quiz::where('author_id', auth()->user()->id)->get();
        }

        return view('questions.create', ['quizzes' => $quizzes]);
    }


    public function saveQuestion(Request $request) {
        $question = new Question;
        $question->question = $request->question;
        $question->picture = $request->picture;
        $question->firstAnswer = $request->firstAnswer;
        $question->secondAnswer = $request->secondAnswer;
        $question->thirdAnswer = $request->thirdAnswer;
        $question->fourthAnswer = $request->fourthAnswer;
        $question->position = $request->position;
        $question->correctAnswer = $request->correctAnswer;
        $question->quiz_id = $request->quiz_id;
        $question->save();

        return redirect()->route('questions.create');
    }


    public function putQuestion(Request $request, int $id){
        $question = Question::find($id);
        $question->update([
            'quiz_id' => $request->quiz_id,
        ]);
        $question->save();
        return back();

    }
}