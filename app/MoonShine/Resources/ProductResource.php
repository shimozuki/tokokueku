<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Validation\Rule;

use MoonShine\Laravel\Resources\ModelResource;

use MoonShine\Support\Attributes\Icon;

use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Select;

#[Icon('shopping-bag')]
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $column = 'name';

    public function getTitle(): string
    {
        return 'Products';
    }

    protected function indexFields(): iterable
    {
        return [

            Text::make('No')
                ->changeFill(
                    fn($item) => $item->getKey()
                ),

            Text::make('Name', 'name'),

            Text::make(
                'Price',
                'price',
                fn($item) =>
                'Rp ' . number_format($item->price, 0, ',', '.')
            ),

            Number::make('Stock', 'stock'),

            Switcher::make('Status', 'status'),

            Image::make('Image', 'image')
                ->disk('public')
                ->dir('products'),
        ];
    }

    protected function formFields(): iterable
    {
        return [

            Select::make('Category', 'category_id')
                ->options(
                    Category::query()
                        ->pluck('name', 'id')
                        ->toArray()
                )
                ->required(),

            Text::make('Name', 'name')
                ->required(),

            Textarea::make('Description', 'description'),

            Number::make('Price', 'price')
                ->required(),

            Number::make('Stock', 'stock')
                ->required(),

            Image::make('Image', 'image')
                ->dir('products'),

            Switcher::make('Status', 'status'),
        ];
    }

    protected function detailFields(): iterable
    {
        return $this->indexFields();
    }

    protected function rules($item): array
    {
        return [

            'category_id' => ['required'],

            'name' => [
                'required',
                Rule::unique('products', 'name')
                    ->ignore($item?->id),
            ],

            'price' => ['required'],

            'stock' => ['required'],
        ];
    }
}
