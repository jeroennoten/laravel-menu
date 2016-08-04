<?php namespace JeroenNoten\LaravelMenu;

class Menu
{
    public static function build()
    {
        return static::builder()->build();
    }

    public static function register(callable $callback)
    {
        static::builder()->register($callback);
    }

    /**
     * @return MenuBuilder
     */
    private static function builder()
    {
        return app(MenuBuilder::class);
    }
}