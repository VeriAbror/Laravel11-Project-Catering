<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesAndMenusTable extends Migration
{
    public function up()
    {
        Schema::create('categories_and_menus', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('menu_name');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories_and_menus');
    }
}

