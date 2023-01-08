<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseEdit extends Component
{

   public $course_id;
    public $name;
    public $description;
    public $price;



    public function mount() {
        $course = Course::findOrFail($this->course_id);
        $this->course_id = $course->id;
        $this->name = $course->name;
        $this->description = $course->description;
        $this->price = $course->price;
    }

    public function render()
    {
        return view('livewire.course-edit');
    }

    protected $rules = [
        'email' => 'email',
        'phone' => 'required',
        'price' => 'required',
    ];

    public function formSubmit() {
        sleep(5);

        $course = Course::findOrFail($this->course_id);

        $this->validate();

        $course->name = $this->name;
        $course->email = $this->email;
        $course->description = $this->description;
        $course->save();

        flash()->addSuccess('Course updated successfully');
    }
}
