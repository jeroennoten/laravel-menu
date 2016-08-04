<?php


namespace JeroenNoten\LaravelMenu;


use Illuminate\Routing\Router;

class Routing
{
    private $router;

    public function __construct(Router $router)
    {
       $this->router = $router;
    }

    public function registerRoutes()
    {
        $this->router->group([
            'namespace' => __NAMESPACE__ . '\\Http\\Controllers',
            'prefix' => 'admin/menu',
            'as' => 'admin.menu.',
            'middleware' => ['web', 'auth']
        ], function (Router $router) {
            $router->get('/', 'MenuAdminController@index')->name('index');
            $router->get('/create', 'MenuAdminController@create')->name('create');
            $router->post('/', 'MenuAdminController@store')->name('store');
            $router->patch('/{item}', 'MenuAdminController@update')->name('update');
            $router->delete('/{item}', 'MenuAdminController@destroy')->name('destroy');
        });
    }
}