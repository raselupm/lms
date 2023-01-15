<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizShow extends Component
{
    public $quiz;
    public $answerOpitons = [
       'answer_a',
       'answer_b',
       'answer_c',
       'answer_d',
    ];
    public $answer;
    public $answer_id;
    public $count_correct_answer = 0;
    public $count_incorrect_answer = 0;
    public $correct_answers = [];
    public function render()
    {

        return view('livewire.quiz-show');
    }
    public function answerUpdate($id){
        $this->answer_id = $id;
    }
    public function result(){
        $question = Question::select('correct_answer')->findOrFail($this->answer_id);
        if($question->correct_answer === $this->answer[$this->answer_id]){
            flash()->addSuccess('Answer is correct');
            $this->correct_answers[$this->answer_id] = true;
            $this->count_correct_answer++;
        }else{
            flash()->addWarning('Answer is incorrect');
            $this->correct_answers[$this->answer_id] = false;
            $this->count_incorrect_answer++;

        }
    }
}
