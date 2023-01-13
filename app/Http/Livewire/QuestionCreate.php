<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionCreate extends Component
{
    public $answers = ['a', 'b', 'c', 'd'];
    public $name;
    public $answer_a;
    public $answer_b;
    public $answer_c;
    public $answer_d;
    public $correct_answer;
    public function render()
    {
        return view('livewire.question-create');
    }

    public function formSubmit() {
        Question::create([
            'name' => $this->name,
            'answer_a' => $this->answer_a,
            'answer_b' => $this->answer_b,
            'answer_c' => $this->answer_c,
            'answer_d' => $this->answer_d,
            'correct_answer' => $this->correct_answer,
        ]);

        return redirect()->route('question.index');
    }
}
