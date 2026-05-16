<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'invoice_number',
        'total_price',
        'payment_method',
        'order_status',
        'payment_status',
        'address',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'total_price' => 'float',
    ];

    public function create(User $user): bool
    {
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
