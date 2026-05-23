<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\OrderResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\{
    Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When
};
use App\MoonShine\Resources\ReportResource;

final class MoonShineLayout extends AppLayout
{
    protected bool $topBar = true;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        $menu = [

            MenuGroup::make('Products', [

                MenuItem::make(
                    'Categories',
                    CategoryResource::class
                ),

                MenuItem::make(
                    'Products',
                    ProductResource::class
                ),

            ]),

            MenuGroup::make('Transactions', [

                MenuItem::make(
                    'Orders',
                    OrderResource::class
                ),

            ]),

            MenuItem::make(
                'Users',
                UserResource::class
            ),
        ];

        /*
    |--------------------------------------------------------------------------
    | Khusus Kepala Toko
    |--------------------------------------------------------------------------
    */

        if (

            auth('moonshine')->user()?->role === 'kepala_toko'

        ) {

            $menu[] = MenuItem::make(

                'Reports',

                ReportResource::class
            );
        }

        return $menu;
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
