<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'name',
        'course_id',
        'class_date',
        'class_day',
        'class_time'
    ];

    protected $table = 'curriculums';

    use HasFactory;

    public function homeworks() {
        return $this->hasMany(Homework::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}
