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
        'qestion',
        'completione_count',
        'answers',
        'correct_answer',
    ];

}
