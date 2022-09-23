<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBoughtServices extends Model
{
    protected $fillable = [
        "user_id",
        "service_id"
    ];
    use HasFactory;
}
