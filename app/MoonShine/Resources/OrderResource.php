<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Order;
use App\Models\User;
use App\MoonShine\Pages\Order\OrderIndexPage;
use Illuminate\Validation\Rule;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\Fields\Textarea;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\IndexPage;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\UI\Fields\Select as FieldsSelect;
use MoonShine\UI\Fields\Text as FieldsText;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Attributes\Icon;
use App\Notifications\OrderStatusNotification;

#[Icon('shopping-cart')]
class OrderResource extends ModelResource
{

    protected string $model = Order::class;

    protected bool $createButton = false;

    protected string $title = 'Orders';


    protected function indexFields(): iterable
    {
        return [

            FieldsText::make('Invoice', 'invoice_number'),

            FieldsSelect::make('Customer', 'user_id')
                ->options(
                    User::query()
                        ->pluck('name', 'id')
                        ->toArray()
                ),

            FieldsText::make('Total Harga', 'total_price')
                ->changeFill(function ($item) {
                    return 'Rp ' . number_format((float) $item->total_price, 0, ',', '.');
                }),

            FieldsSelect::make('Metode Pembayaran', 'payment_method')
                ->options([
                    'transfer' => 'Transfer',
                    'qris' => 'QRIS',
                    'cod' => 'COD',
                ]),

            FieldsSelect::make('Status Orderan', 'order_status')
                ->options([
                    'baru' => 'Baru',
                    'diproses' => 'Diproses',
                    'dikirim' => 'Dikirim',
                    'selesai' => 'Selesai',
                    'batal' => 'Batal',
                ])
                ->sortable(),

            FieldsSelect::make('Status Pembayaran', 'payment_status')
                ->options([
                    'belum_bayar' => 'Belum Bayar',
                    'lunas' => 'Lunas',
                ]),

            FieldsText::make('Lokasi')
                ->changeFill(function ($item) {

                    if (!$item->latitude || !$item->longitude) {
                        return '-';
                    }

                    $url = "https://www.google.com/maps?q={$item->latitude},{$item->longitude}";

                    return "<a href='{$url}' target='_blank'>
                    📍 Lihat Lokasi
                </a>";
                })
                ->unescape(),

        ];
    }

    protected function detailFields(): iterable
    {
        return [
            FieldsText::make('Invoice', 'invoice_number'),

            FieldsSelect::make('Customer', 'user_id')
                ->options(
                    User::query()
                        ->pluck('name', 'id')
                        ->toArray()
                ),

            FieldsText::make('Total Harga', 'total_price')
                ->changeFill(function ($item) {
                    return 'Rp ' . number_format((float) $item->total_price, 0, ',', '.');
                }),

            FieldsSelect::make('Metode Pembayaran', 'payment_method')
                ->options([
                    'transfer' => 'Transfer',
                    'qris' => 'QRIS',
                    'cod' => 'COD',
                ]),

            FieldsSelect::make('Status Orderan', 'order_status')
                ->options([
                    'baru' => 'Baru',
                    'diproses' => 'Diproses',
                    'dikirim' => 'Dikirim',
                    'selesai' => 'Selesai',
                    'batal' => 'Batal',
                ])
                ->sortable(),

            FieldsSelect::make('Status Pembayaran', 'payment_status')
                ->options([
                    'belum_bayar' => 'Belum Bayar',
                    'lunas' => 'Lunas',
                ]),

            FieldsText::make('Lokasi')
                ->changeFill(function ($item) {

                    if (!$item->latitude || !$item->longitude) {
                        return '-';
                    }

                    $url = "https://www.google.com/maps?q={$item->latitude},{$item->longitude}";

                    return "<a href='{$url}' target='_blank'>
                    📍 Lihat Lokasi
                </a>";
                })
                ->unescape(),

            FieldsText::make('Detail Item')
                ->changeFill(function ($order) {

                    if ($order->items->isEmpty()) {
                        return '-';
                    }

                    $html = '';

                    foreach ($order->items as $item) {

                        $image = asset('storage/' . $item->product->image);

                        $name = $item->product->name;

                        $qty = $item->quantity;

                        $price = number_format($item->price, 0, ',', '.');

                        $subtotal = number_format($item->subtotal, 0, ',', '.');

                        $html .= "
                <div style='
                    display:flex;
                    gap:15px;
                    margin-bottom:20px;
                    padding:15px;
                    border:1px solid #eee;
                    border-radius:12px;
                    align-items:center;
                '>

                    <img
                        src='{$image}'
                        style='
                            width:90px;
                            height:90px;
                            object-fit:cover;
                            border-radius:12px;
                        '
                    >

                    <div>
                        <div style='font-weight:bold;font-size:16px'>
                            {$name}
                        </div>

                        <div>Qty: {$qty}</div>

                        <div>Harga: Rp {$price}</div>

                        <div>Subtotal: Rp {$subtotal}</div>
                    </div>
                </div>
            ";
                    }

                    return $html;
                })
                ->unescape(),

            FieldsText::make('Catatan', 'notes'),
            FieldsText::make('Tanggal ambil/tanggal antar', 'pickup_date'),
        ];
    }

    protected function formFields(): iterable
    {
        return [

            FieldsSelect::make('Status Orderan', 'order_status')
                ->options([
                    'baru' => 'Baru',
                    'diproses' => 'Diproses',
                    'dikirim' => 'Dikirim',
                    'selesai' => 'Selesai',
                    'batal' => 'Batal',
                ]),

            FieldsSelect::make('Status Pembayaran', 'payment_status')
                ->options([
                    'belum_bayar' => 'Belum Bayar',
                    'lunas' => 'Lunas',
                ]),

            FieldsSelect::make('Metode Pembayaran', 'payment_method')
                ->options([
                    'cod' => 'COD',
                    'qris' => 'QRIS',
                    'transfer' => 'Transfer',
                ]),
        ];
    }

    protected function afterUpdated(mixed $item): mixed
    {
        $item->user->notify(

            new OrderStatusNotification($item)

        );

        return $item;
    }
}
