<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            // promotion_id có thể null nếu không áp dụng khuyến mãi riêng cho mục này
            $table->unsignedInteger('promotion_id')->nullable();
            // item_type: chỉ nhận giá trị 'menu' hoặc 'combo'
            $table->enum('item_type', ['menu', 'combo']);
            // item_id: ID của MenuItems hoặc ComboItems tùy vào item_type
            $table->unsignedInteger('item_id');
            $table->decimal('discount_value', 8, 2)->default(0);
            $table->unsignedInteger('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}