<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuponCode extends Model
{
    use HasFactory;

    protected $fillable=[
        "cupon_code",
        "name",
        "type",
        "amount",
        "description",
        "status",
        "start_date",
        "end_date",
        "code_limit"
    ];
  
}
