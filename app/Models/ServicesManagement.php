<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesManagement extends Model
{

    protected $fillable = [
        "service_id",
        "question_id"
    ];
    use HasFactory;
}
