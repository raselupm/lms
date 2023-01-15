<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        return view('quiz.index');
    }

    public function create() {
        return view('quiz.create');
    }

    public function store(Request $request) {
        $quiz = $request->validate([
            'name' => 'required',
        ]);


        $created = Quiz::create($quiz);

        flash()->addSuccess('Quiz created successfully');


        return redirect()->route('quiz.index',$created->id);
    }

    public function show(Quiz $quiz) {
        return view('quiz.show', [
            'quiz' => $quiz,
        ]);
    }
    public function edit(Quiz $quiz)
    {
        return view('quiz.edit', compact('quiz'));
    }


    public function quizShow($id) {
        $quiz = Quiz::findOrFail($id);
        return view('quiz.quiz-show', [
            'quiz' => $quiz,
        ]);
    }
}
