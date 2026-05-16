<?php

namespace App\Exports;

use App\Models\Order;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::select(

            'invoice_number',
            'total_price',
            'payment_method',
            'order_status',
            'payment_status',
            'created_at'

        )->get();
    }

    public function headings(): array
    {
        return [

            'Invoice',

            'Total Harga',

            'Metode Pembayaran',

            'Status Order',

            'Status Pembayaran',

            'Tanggal',
        ];
    }
}
