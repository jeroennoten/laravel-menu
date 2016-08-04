<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class NumberMenuItems extends Migration {

    public function up()
    {
        foreach (DB::table('menu_items')->get() as $i => $item) {
            DB::table('menu_items')->where('id', $item->id)->update(['display_order' => $i]);
        }
    }
    
    public function down()
    {
        DB::table('menu_items')->update(['display_order' => 0]);
    }

}