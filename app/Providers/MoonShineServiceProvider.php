<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\OrderResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuItem::make('Dashboard', '/admin'),


            MenuGroup::make('Product', [

                MenuItem::make(
                    'Categories',
                    new CategoryResource()
                ),

                MenuItem::make(
                    'Products',
                    new ProductResource()
                ),

            ]),

            MenuGroup::make('Transactions', [

                MenuItem::make(
                    'Orders',
                    new OrderResource()
                ),

            ]),


            MenuItem::make('Users', new UserResource()),
        ];
    }

    protected function middleware(): array
    {
        return [
            'web',
            'auth',
            'moonshine',
            'moonshine.role',
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
