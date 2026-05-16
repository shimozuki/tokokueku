<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;

use MoonShine\Laravel\Resources\ModelResource;

use MoonShine\Support\Attributes\Icon;

use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;


class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $column = 'name';

    public function getTitle(): string
    {
        return 'Categories';
    }

    protected function indexFields(): iterable
    {
        return [

            ID::make()->sortable(),

            Text::make('Name', 'name'),

            Text::make('Slug', 'slug'),
        ];
    }

    protected function formFields(): iterable
    {
        return [

            Text::make('Name', 'name')
                ->required(),

            Text::make('Slug', 'slug')
                ->required(),
        ];
    }

    protected function detailFields(): iterable
    {
        return $this->indexFields();
    }

    protected function rules($item): array
    {
        return [

            'name' => ['required'],

            'slug' => ['required'],
        ];
    }

    protected function search(): array
    {
        return [
            'id',
            'name',
            'slug',
        ];
    }
}
