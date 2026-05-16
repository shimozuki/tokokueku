<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\OrderItem;
use App\Models\Product;

use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;

use MoonShine\Resources\ModelResource;

class OrderItemResource extends ModelResource
{
    protected string $model = OrderItem::class;

    protected string $title = 'Order Items';

    public function fields(): array
    {
        return [

            Select::make('Product', 'product_id')
                ->options(
                    Product::query()
                        ->pluck('name', 'id')
                        ->toArray()
                ),

            Number::make('Quantity', 'quantity'),

            Number::make('Price', 'price'),

            Number::make('Subtotal', 'subtotal'),
        ];
    }

    public function rules(mixed $item): array
    {
        return [
            'product_id' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
            'subtotal' => ['required'],
        ];
    }
}
