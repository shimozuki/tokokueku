<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;

use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\OrderResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\ReportResource;
use App\MoonShine\Resources\UserResource;

use App\MoonShine\Pages\ReportIndexPage;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(
        CoreContract $core,
        ConfiguratorContract $config
    ): void {

        $config->title('🍰 TokoKueKu');

        Gate::define('moonshine', function ($user) {

            return in_array(
                $user->role,
                [
                    'admin',
                    'kepala_toko'
                ]
            );
        });

        $core->resources([
            CategoryResource::class,
            ProductResource::class,
            OrderResource::class,
            UserResource::class,
            ReportResource::class,
        ])->pages([
            ...$config->getPages(),
            ReportIndexPage::class,
        ]);
    }
}
