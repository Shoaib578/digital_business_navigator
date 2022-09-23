<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPoints extends Model
{
    protected $fillable = [
        "user_id",
        "service_id",
        "points"
    ];
    use HasFactory;
}
