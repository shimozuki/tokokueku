<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [

            'title' => 'Status Pesanan Diperbarui',

            'message' =>

            'Pesanan '

                . $this->order->invoice_number

                . ' sekarang '

                . strtoupper($this->order->order_status),

            'order_id' => $this->order->id,
        ];
    }
}
