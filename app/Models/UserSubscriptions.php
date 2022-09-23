<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscriptions extends Model
{
    

    protected $primaryKey = 'user_subscription_id';
    
    protected $fillable = [
        "expire_date",
        "user_id",
        "subscription_id",

    ];
    use HasFactory;
}
