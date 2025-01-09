<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'name',
        'email',
        'phone',
        'region',
        'address',
        'payment_method',
        'payment_slip',
        'total_price',
        'note',
        'payment_account_name',
        'status',
        "payment_status",
        "cupon_code_id",
        "country"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function customerType()
    {
        return $this->belongsTo(Type::class, 'customer_type');
    }

    public function CuponCode(){
        return $this->belongsTo(CuponCode::class, 'cupon_code_id', 'id');
    }

}
