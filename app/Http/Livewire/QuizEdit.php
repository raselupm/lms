<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizEdit extends Component
{
    public $quiz;
    public $question_id;
    public function render()
    {

        return view('livewire.quiz-edit', [
            'questions' => Question::select(['id', 'name'])->get()
        ]);
    }

    public function addQuestion() {
        $this->quiz->questions()->attach($this->question_id);
        $this->question_id = '';

        flash()->addSuccess('Question added successfully');
    }
}
