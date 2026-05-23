<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'invoice_number',
        'product_id',
        'pickup_date',
        'notes',
        'latitude',
        'longitude',
        'total_price',
        'order_status',
        'payment_status',
        'payment_method'
    ];

    protected $casts = [
        'total_price' => 'float',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
