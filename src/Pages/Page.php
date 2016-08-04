<?php


namespace JeroenNoten\LaravelMenu\Pages;


class Page
{
    public $name;
    public $url;

    public function __construct($name, $url)
    {
        $this->name = $name;
        $this->url = $url;
    }
}