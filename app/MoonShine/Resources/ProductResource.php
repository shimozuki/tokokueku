<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Validation\Rule;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Select;

use MoonShine\Resources\ModelResource;

class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Products';

    public function fields(): array
    {
        return [
            ID::make()->hideOnIndex(),
            Select::make('Category', 'category_id')
                ->options(
                    Category::query()
                        ->pluck('name', 'id')
                        ->toArray()
                ),

            Text::make('Name', 'name'),

            Textarea::make('Description', 'description'),

            Text::make('Price', 'price', function ($item) {
                return 'Rp ' . number_format($item->price, 0, ',', '.');
            }),

            Number::make('Stock', 'stock'),

            Image::make('Image', 'image')
                ->dir('products'),

            Switcher::make('Status', 'status'),
        ];
    }

    public function rules(mixed $item): array
    {
        return [
            'category_id' => ['required'],

            'name' => [
                'required',
                'string',
                Rule::unique('products', 'name')->ignore($item?->id),
            ],

            'description' => ['nullable'],

            'price' => ['required', 'numeric'],

            'stock' => ['required', 'integer'],

            'image' => ['nullable'],

            'status' => ['nullable'],
        ];
    }
}
