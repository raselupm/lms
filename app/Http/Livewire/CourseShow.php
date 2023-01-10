<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Curriculum;
use Livewire\Component;

class CourseShow extends Component
{
    public $course_id;
    public function render()
    {
        $course = Course::findOrFail($this->course_id)->with('curriculumns')->first();
        return view('livewire.course-show',['course' => $course]);
    }

    public function curriculamDelete($id){
        $curriculum = Curriculum::findOrFail($id);

        $curriculum->delete();

        flash()->addSuccess('Curriculum deleted successfully');
    }
}
