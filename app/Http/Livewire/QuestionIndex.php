<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use Livewire\WithPagination;

class QuestionIndex extends Component
{
    public function render()
    {
        $questions = Question::paginate(15);

        return view('livewire.question-index', [
            'questions' => $questions
        ]);
    }

    public function questionDelete($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        flash()->addSuccess('Question deleted successfully!');
    }
}
