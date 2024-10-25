<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMenuTable extends Migration
{
    public function up()
    {
        Schema::create('order_menu', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign Key
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade'); // Foreign Key
            $table->primary(['order_id', 'menu_id']); // Composite Primary Key
            $table->timestamps(); // Tambahkan timestamps di sini
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_menu');
    }
}
