<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $primaryKey = 'question_id';

    protected $fillable = [
       
        "question"
    ];
    use HasFactory;
}
