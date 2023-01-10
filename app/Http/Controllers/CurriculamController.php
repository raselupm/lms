<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculamController extends Controller
{

    public function show($id){
        return view('course.curriculum.show',['id'=>$id]);
    }
    public function edit($id){
        return view('course.curriculum.edit',['id'=>$id]);
    }
}
