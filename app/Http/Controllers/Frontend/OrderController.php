<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\NewOrderNotification;
use Barryvdh\DomPDF\Facade\Pdf;

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
            ->route('my.orders');
    }

    public function myOrders()
    {
        $orders = Order::where(
            'user_id',
            auth()->id()
        )->latest()->paginate(5);

        return view(
            'frontend.orders.index',
            compact('orders')
        );
    }

    public function show($id)
    {
        $order = Order::join(
            'products',
            'orders.product_id',
            '=',
            'products.id'
        )

            ->join(
                'users',
                'orders.user_id',
                '=',
                'users.id'
            )

            ->select(

                'orders.*',

                'products.name as product_name',

                'products.description as product_description',

                'products.image as product_image',

                'users.name as customer_name'
            )

            ->where(
                'orders.user_id',
                auth()->id()
            )

            ->where(
                'orders.id',
                $id
            )

            ->firstOrFail();

        return view(
            'frontend.orders.show',
            compact('order')
        );
    }

    public function invoice($id)
    {
        $order = Order::with('items.product', 'user')
            ->findOrFail($id);

        $pdf = Pdf::loadView(
            'frontend.orders.invoice',
            compact('order')
        );

        return $pdf->download(
            'invoice-' . $order->invoice_number . '.pdf'
        );
    }
}
