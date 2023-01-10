<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculumEdit extends Component
{
    public $curriculum_id;
    public $name;
    public function mount(){
        $curriculum = Curriculum::findOrFail($this->curriculum_id);

        $this->name = $curriculum->name;
    }
    protected $rules = [
        'name' => 'required',
    ];
    public function render()
    {
        return view('livewire.curriculum-edit');
    }

    public function curriculumUpdate(){
        $this->validate();
        $curriculum = Curriculum::findOrFail($this->curriculum_id);

        $curriculum->name = $this->name;
        $curriculum->save();

        flash()->addSuccess('Curriculum updated successfully');

    }
}
