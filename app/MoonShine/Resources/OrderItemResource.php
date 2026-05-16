<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\OrderItem;

use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Image;

use MoonShine\Pages\Crud\IndexPage;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\FormPage;

use MoonShine\Laravel\Resources\ModelResource;

class OrderItemResource extends ModelResource
{
    protected string $model = OrderItem::class;

    protected string $title = 'Order Items';


    public function fields(): array
    {
        return [

            Image::make('Gambar', 'product.image')
                ->disk('public'),

            Text::make('Produk')
                ->changeFill(
                    fn($item) =>
                    $item->product?->name
                ),

            Text::make('Qty', 'quantity'),

            Text::make('Harga')
                ->changeFill(
                    fn($item) =>
                    'Rp ' . number_format($item->price, 0, ',', '.')
                ),

            Text::make('Subtotal')
                ->changeFill(
                    fn($item) =>
                    'Rp ' . number_format($item->subtotal, 0, ',', '.')
                ),
        ];
    }

    public function rules(mixed $item): array
    {
        return [];
    }
}
