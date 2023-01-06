<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays = [];


    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required',
    ];


    public function formSubmit() {
        $this->validate();

        $course = Course::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => auth()->user()->id
        ]);

        foreach($this->selectedDays as $day) {
            // check how many sunday available

            $i = 0;

            // loop sundays

        }
    }


    public function render()
    {
        return view('livewire.course-create');
    }
}
