<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'promo_code',
        'quantity',
        'discount_value',
        'start_date',
        'end_date',
    ];

    // Một Promotion có thể áp dụng cho nhiều đơn hàng hoặc Order Items
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
