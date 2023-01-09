<?php

namespace App\Http\Livewire;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Course;
use Livewire\Component;
use App\Models\Curriculum;
use Illuminate\Support\Facades\Auth;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays = [];
    public $time;
    public $end_date;

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

    public function render()
    {
        return view('livewire.course-create');
    }


    public function formSubmit()
    {
        $this->validate();
        $course = Course::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => Auth::user()->id
        ]);

        foreach ($this->selectedDays as $day) {
            // check how many sunday available
            $i = 1;
            $start_date = new DateTime(Carbon::now());
            $endDate =   new DateTime($this->end_date);
            $interval =  new DateInterval('P1D');
            $date_range = new DatePeriod($start_date, $interval, $endDate);
            foreach ($date_range as $date) {
                if ($date->format("l") === $day) { // Need to make Selected day Dynamic
                    Curriculum::create([
                        'name' => $this->name . ' #' . $i++,
                        'week_day' => $day,
                        'class_time' => $this->time,
                        'end_date' => $this->end_date,
                        'course_id' => $course->id,
                    ]);
                }
            }
            $i++;
        }

        flash()->addSuccess('Course created successfully');

        return redirect()->route('course.index');
    }
}
