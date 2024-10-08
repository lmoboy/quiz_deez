<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'owner_id',
        'question',
        'completion_count',
        'incorrect_answers',
        'correct_answer',
        'category'
    ];

}
