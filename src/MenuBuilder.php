<?php namespace JeroenNoten\LaravelMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuBuilder
{
    private $menu = [];

    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        $menu = [];
        foreach ($this->menu as $itemConfiguration) {
            $items = $this->makeItems($itemConfiguration);
            if ($items) {
                array_push($menu, ...$items);
            }
        }
        return $menu;
    }

    public function register(...$items)
    {
        if (!empty($items)) {
            array_push($this->menu, ...$items);
        }
    }

    private function makeItems($items)
    {
        if (is_callable($items)) {
            $items = $items();
        }
        return array_map(function ($item) {
            if (!isset($item['url'])) {
                $item['url'] = '#';
            }
            $item['active'] = $this->isActive($item);
            return $item;
        }, $items);
    }

    private function isActive($item)
    {
        return Str::startsWith($this->request->path(), $item['url']);
    }
}