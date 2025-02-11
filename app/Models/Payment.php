<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'payment_date',
    ];

    // Một Payment thuộc về 1 Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
