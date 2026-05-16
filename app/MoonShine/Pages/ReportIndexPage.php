<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\UI\Components\ActionButton;

class ReportIndexPage extends IndexPage
{
    protected bool $createButton = false;

    protected bool $editButton = false;

    protected bool $deleteButton = false;

    protected function rowButtons(): iterable
    {
        return [

            ActionButton::make('View')
                ->icon('eye'),
        ];
    }

    protected function topRightButtons(): iterable
    {
        return [

            ActionButton::make(
                'Export Excel',
                '/export-sales'
            ),
        ];
    }
}
