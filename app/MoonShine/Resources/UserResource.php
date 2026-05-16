<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User;
use Illuminate\Validation\Rule;
use MoonShine\Fields\ID;
use MoonShine\Fields\Password;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    public function fields(): array
    {
        return [

            ID::make()->hideOnIndex(),

            Text::make('Name', 'name'),

            Text::make('Email', 'email'),

            Password::make('Password', 'password')
                ->hideOnIndex(),

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
