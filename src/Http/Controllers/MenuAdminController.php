<?php


namespace JeroenNoten\LaravelMenu\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use JeroenNoten\LaravelMenu\Menu;
use JeroenNoten\LaravelMenu\Models\MenuItem;
use JeroenNoten\LaravelMenu\Pages\Registrar;

class MenuAdminController extends Controller
{
    public function index()
    {
        $items = MenuItem::all();
        return view('menu::admin.index', compact('items'));
    }

    public function create()
    {
        $pages = Registrar::get();
        return view('menu::admin.create', compact('pages'));
    }

    public function store(Request $request, Redirector $redirector)
    {
        MenuItem::create($request->all());
        return $redirector->route('admin.menu.index');
    }

    public function destroy(MenuItem $item, Redirector $redirector)
    {
        $item->delete();
        return $redirector->route('admin.menu.index');
    }

    public function update(MenuItem $item, Request $request, Redirector $redirector)
    {
        if ($request->input('display_order') > $item->displayOrder) {
            $item->moveDown();
        } else {
            $item->moveUp();
        }
        return $redirector->route('admin.menu.index');
    }
}