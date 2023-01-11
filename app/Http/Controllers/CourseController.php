<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.index');
    }

    public function create()
    {
        return view('course.create');
    }

    public function edit($id)
    {
        return view('course.edit', [
            'course_id' => $id,
        ]);
    }

    public function show($id)
    {
        return view('course.show',['id' => $id]);
    }
}
