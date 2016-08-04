<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDisplayOrderColumnToMenuItemsTable extends Migration {

    public function up()
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->integer('display_order')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropColumn('display_order');
        });
    }

}