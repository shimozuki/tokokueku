<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Order;
use App\Models\User;

use Illuminate\Validation\Rule;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\Fields\Textarea;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\IndexPage;

use MoonShine\Resources\ModelResource;

class OrderResource extends ModelResource
{
    protected string $model = Order::class;

    protected string $title = 'Orders';

    protected function pages(): array
    {
        return [
            IndexPage::make($this->title()),
            DetailPage::make('Detail'),
        ];
    }

    public function fields(): array
    {
        return [

            Text::make('Invoice', 'invoice_number'),

            Select::make('Customer', 'user_id')
                ->options(
                    User::query()
                        ->pluck('name', 'id')
                        ->toArray()
                ),

            Text::make('Total Price', 'total_price')
                ->changeFill(function ($value) {
                    return 'Rp ' . number_format((float) $value, 0, ',', '.');
                }),

            Select::make('Payment Method', 'payment_method')
                ->options([
                    'transfer' => 'Transfer',
                    'qris' => 'QRIS',
                    'cod' => 'COD',
                ]),

            Select::make('Order Status', 'order_status')
                ->options([
                    'baru' => 'Baru',
                    'diproses' => 'Diproses',
                    'dikirim' => 'Dikirim',
                    'selesai' => 'Selesai',
                    'batal' => 'Batal',
                ]),

            Select::make('Payment Status', 'payment_status')
                ->options([
                    'belum_bayar' => 'Belum Bayar',
                    'lunas' => 'Lunas',
                ]),

            Textarea::make('Address', 'address'),
        ];
    }

    public function rules(mixed $item): array
    {
        return [
            'user_id' => ['required'],

            'invoice_number' => [
                'required',
                Rule::unique('orders', 'invoice_number')
                    ->ignore($item?->id),
            ],

            'payment_method' => ['required'],

            'order_status' => ['required'],

            'payment_status' => ['required'],
        ];
    }
}
