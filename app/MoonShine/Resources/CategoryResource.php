<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Categories';

    public function fields(): array
    {
        return [
            ID::make()->hideOnIndex(),

            Text::make('Name', 'name'),

            Text::make('Slug', 'slug'),
        ];
    }

    public function rules(mixed $item): array
    {
        return [
            'name' => ['required'],
            'slug' => ['required'],
        ];
    }
}
