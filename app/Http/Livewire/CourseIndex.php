<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {
        $course = Course::paginate(10);

        return view('livewire.course-index', [
            'courses' => $course,
        ]);
    }

    public function courseDelete($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        flash()->addSuccess('Course deleted successfully!');
    }
}
