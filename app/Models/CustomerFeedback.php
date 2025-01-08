<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFeedback extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "title",
        "about",
        "image"
    ];
}
