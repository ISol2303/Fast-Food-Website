<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComboItemDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('combo_item_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('combo_item_id');
            $table->unsignedInteger('menu_item_id');
            $table->unsignedInteger('quantity');
            $table->timestamps();

            $table->foreign('combo_item_id')->references('id')->on('combo_items')->onDelete('cascade');
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('combo_item_details');
    }
}