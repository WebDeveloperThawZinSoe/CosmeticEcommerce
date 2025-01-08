<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VIPRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "type_id",
        "status",
        "comment"
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
