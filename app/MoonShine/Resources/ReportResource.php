<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Order;

use Illuminate\Database\Eloquent\Builder;

use MoonShine\Laravel\Resources\ModelResource;

use MoonShine\Support\Attributes\Icon;

use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Date;

use MoonShine\UI\Components\ActionButton;

use MoonShine\Support\ListOf;

#[Icon('chart-bar')]
class ReportResource extends ModelResource
{
    protected string $model = Order::class;

    public function canDelete(): bool
    {
        return false;
    }

    public function canCreate(): bool
    {
        dd('masuk');
        return false;
    }
    public function canEdit(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return 'Laporan Keuangan';
    }



    /*
    |--------------------------------------------------------------------------
    | FILTER
    |--------------------------------------------------------------------------
    */

    protected function filters(): iterable
    {
        return [

            Date::make(
                'Dari Tanggal',
                'from'
            ),

            Date::make(
                'Sampai Tanggal',
                'to'
            ),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected function indexFields(): iterable
    {
        return [

            Text::make(
                'Invoice',
                'invoice_number'
            ),

            Text::make(
                'Customer',
                'user.name'
            ),

            Number::make(
                'Total',
                'total_price'
            ),

            Text::make(
                'Status',
                'order_status'
            ),

            Date::make(
                'Tanggal',
                'created_at'
            ),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT BUTTON
    |--------------------------------------------------------------------------
    */

    protected function topButtons(): ListOf
    {
        return parent::topButtons()->add(

            ActionButton::make(

                'Export Excel',

                route('export.sales')
            )
                ->primary()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | AUTH
    |--------------------------------------------------------------------------
    */

    public static function authorized(): bool
    {
        return auth('moonshine')->user()?->role === 'kepala_toko';
    }

    public function query(): Builder
    {
        return parent::query()

            ->when(

                request('from'),

                fn($q) => $q->whereDate(
                    'created_at',
                    '>=',
                    request('from')
                )
            )

            ->when(

                request('to'),

                fn($q) => $q->whereDate(
                    'created_at',
                    '<=',
                    request('to')
                )
            );
    }
}
