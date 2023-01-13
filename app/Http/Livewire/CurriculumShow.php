<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\Curriculum;
use App\Models\Note;
use Livewire\Component;

class CurriculumShow extends Component
{
    public $curriculum_id;
    public $note;

    protected $rules = [
        'note' => 'required',
    ];
    public function render()
    {
        $curriculum = Curriculum::findOrFail($this->curriculum_id);

        return view('livewire.curriculum-show',[
            'curriculum' => $curriculum,
            'notes' => $curriculum->notes,
        ]);
    }

    public function addNote(){
         $this->validate();
          $curriculum = Curriculum::findOrFail($this->curriculum_id);
          $note = new Note();
          $note->description = $this->note;
          $note->save();

          $curriculum->notes()->attach($note->id);

          $this->note = '';

          flash()->addSuccess('Note added successfully!');
    }

    public function attendance($student_id) {
        Attendance::create([
            'curriculum_id' => $this->curriculum_id,
            'user_id' => $student_id
        ]);

        flash()->addSuccess('Attendance added successfully!');
    }
}
