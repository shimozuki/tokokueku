<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Order;
use App\MoonShine\Pages\ReportIndexPage;
use MoonShine\Laravel\Resources\ModelResource;

use MoonShine\Support\Attributes\Icon;

use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;

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
        return false;
    }

    public function canEdit(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return 'Laporan';
    }

    protected function indexFields(): iterable
    {
        return [

            Text::make('Invoice', 'invoice_number'),

            Text::make('Customer', 'user.name'),

            Number::make('Total', 'total_price'),

            Text::make('Status', 'order_status'),
        ];
    }

    protected function pages(): array
    {
        return [

            ReportIndexPage::class,
        ];
    }
}
