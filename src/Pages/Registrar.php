<?php


namespace JeroenNoten\LaravelMenu\Pages;


class Registrar
{
    private static $providers = [];

    public static function register(Provider $provider)
    {
        self::$providers[] = $provider;
    }

    public static function get()
    {
        return collect(self::$providers)->reduce(function ($pages, Provider $provider) {
            return array_merge($pages, $provider->getPages());
        }, []);
    }
}