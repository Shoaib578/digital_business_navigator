<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = [
        "title",
        "file_name"
    ];
    use HasFactory;
}
