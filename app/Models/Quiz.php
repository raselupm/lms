<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function questions() {
        return $this->belongsToMany(Question::class, 'quiz_question', 'quiz_id', 'question_id');
    }
}
