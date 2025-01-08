<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuponUseLog extends Model
{
    use HasFactory;
    protected $fillable=[
        "cupon_id",
        "cupon_code",
        "name",
        "type",
        "amount",
        "user_id",
        "order_id",
    ];

    public function OrderInfo(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

}
