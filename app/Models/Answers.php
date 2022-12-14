<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = [
        "answer",
        "points",
        "question_id"
    ];
    use HasFactory;
}
