<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Order;

use MoonShine\Laravel\Pages\Crud\IndexPage;

use MoonShine\UI\Components\ActionButton;

class ReportIndexPage extends IndexPage
{
    protected bool $createButton = false;

    public function topRightButtons(): iterable
    {
        return [

            ActionButton::make(

                'Export Excel',

                fn() => route(
                    'export.sales',
                    request()->all()
                )
            )
        ];
    }

    public function metrics(): array
    {
        $query = Order::query();

        if (request('from')) {

            $query->whereDate(
                'created_at',
                '>=',
                request('from')
            );
        }

        if (request('to')) {

            $query->whereDate(
                'created_at',
                '<=',
                request('to')
            );
        }

        return [

            'Total Transaksi' => $query->count(),

            'Total Pendapatan' => 'Rp ' . number_format(

                $query->sum('total_price'),

                0,

                ',',

                '.'
            ),
        ];
    }
}
