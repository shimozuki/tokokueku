<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User;
use Illuminate\Validation\Rule;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Attributes\Icon;

#[Icon('users')]
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    protected function indexFields(): iterable
    {
        return [

            Text::make('Name', 'name'),

            Text::make('Email', 'email'),

            Text::make('Role', 'role'),
        ];
    }

    protected function formFields(): iterable
    {
        return [

            Text::make('Name', 'name'),

            Text::make('Email', 'email'),

            Password::make('Password', 'password'),

            Select::make('Role', 'role')
                ->options([
                    'admin' => 'Admin',
                    'kepala_toko' => 'Kepala Toko',
                    'pelanggan' => 'Pelanggan',
                ]),
        ];
    }

    public function rules(mixed $item): array
    {
        return [
            'name' => ['required', 'string'],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($item?->id),
            ],

            'password' => $item
                ? ['nullable']
                : ['required'],

            'role' => ['required'],
        ];
    }
}
