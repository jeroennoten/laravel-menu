<?php

namespace JeroenNoten\LaravelMenu;

use Illuminate\Config\Repository;
use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use JeroenNoten\LaravelMenu\Models\MenuItem;
use JeroenNoten\LaravelPackageHelper\ServiceProviderTraits\Config;
use JeroenNoten\LaravelPackageHelper\ServiceProviderTraits\Migrations;
use JeroenNoten\LaravelPackageHelper\ServiceProviderTraits\Views;

class ServiceProvider extends BaseServiceProvider
{
    use Views, Config, Migrations;

    public function boot(Repository $config, Dispatcher $events, Routing $routing)
    {
        $this->loadViews();
        $this->publishConfig();
        $this->publishMigrations();
        $this->registerMenuFromConfig($config);
        $this->registerMenuFromDatabase();
        $routing->registerRoutes();

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text' => 'Menu',
                'url' => 'admin/menu'
            ]);
        });
    }

    public function register()
    {
        $this->app->singleton(MenuBuilder::class);
    }

    private function registerMenuFromConfig(Repository $config)
    {
        Menu::register(function () use ($config) {
            return $config->get('menu.menus.main');
        });
    }

    protected function path()
    {
        return __DIR__ . '/..';
    }

    protected function name()
    {
        return 'menu';
    }

    private function registerMenuFromDatabase()
    {
        Menu::register(function () {
            return MenuItem::all()->all();
        });
    }
}