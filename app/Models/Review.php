<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_item_id',
        'rating',
        'comment',
        'review_date',
    ];

    // Một Review thuộc về 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Một Review thuộc về 1 MenuItem
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
