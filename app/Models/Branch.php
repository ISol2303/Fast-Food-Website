<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'operating_hours',
        'latitude',
        'longitude',
    ];

    // Một Branch có thể phục vụ nhiều Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}