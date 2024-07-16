<?php

namespace Westreels\WestreelsMain;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Westreels\WestreelsMain\Commands\WestreelsMainCommand;


class WestreelsMainServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('westreels-main')
            ->hasMigrations(['create_westreels_gamesessions_table', 'create_westreels_gamelist_pragmatic_table', 'modify_users_table'])
            ->hasConfigFile(['gameconfig'])
            ->hasViews('westreels')
            ->hasRoutes(['web', 'pragmatic_routes'])
            ->hasCommand(WestreelsMainCommand::class);
    }
}
