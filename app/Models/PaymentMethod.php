<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable=[
        "method_name",
        "icon",
        "account_no",
        "account_name"
    ];
}
