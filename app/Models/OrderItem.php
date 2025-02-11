<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'promotion_id',
        'item_type',   // 'menu' hoặc 'combo'
        'item_id',     // ID của Menu hoặc Combo
        'discount_value',
        'quantity',
        'price',
    ];

    // Một OrderItem thuộc về 1 Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Nếu cần, bạn có thể định nghĩa quan hệ với Promotion
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
