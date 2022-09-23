<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsManagment extends Model
{
    protected $primaryKey = 'question_m_id';

    
    protected $fillable = [
        "question_id",
        "answer_id"
    ];
    use HasFactory;
}
