<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{

    protected $fillable = [
        "level",
        "required_points"
    ];

    use HasFactory;
}
