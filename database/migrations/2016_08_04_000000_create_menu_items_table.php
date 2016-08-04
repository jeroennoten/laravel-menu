<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuItemsTable extends Migration {

    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->text('url');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::drop('menu_items');
    }

}