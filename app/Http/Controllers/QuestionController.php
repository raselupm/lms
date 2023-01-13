<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        return view('question.index');
    }

    public function create() {
        return view('question.create');
    }
}
