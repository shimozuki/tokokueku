<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\NewOrderNotification;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([


            'product_id' => 'required',

            'pickup_date' => 'required',
        ]);

        $order = Order::create([

            'user_id' => auth('moonshine')->user()->id,

            'invoice_number' => 'INV-' . strtoupper(Str::random(8)),

            'product_id' => $request->product_id,


            'pickup_date' => $request->pickup_date,

            'notes' => $request->notes,

            'latitude' => $request->latitude,

            'longitude' => $request->longitude,

            'total_price' => $request->total_price,

            'payment_method' => 'cod',

            'order_status' => 'baru',

            'payment_status' => 'belum_bayar',

            'payment_method' => $request->payment_method,

        ]);

        OrderItem::create([

            'order_id' => $order->id,

            'product_id' => $request->product_id,

            'quantity' => 1,

            'price' => $request->total_price,

            'subtotal' => $request->total_price,
        ]);

        $admins = User::all();

        foreach ($admins as $admin) {

            $admin->notify(
                new NewOrderNotification($order)
            );
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Pesanan berhasil dibuat 😄'
            );
    }
}
