<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->date('order_date');
            $table->integer('total_amount');
            $table->boolean('payment_status');
            $table->string('payment_method');
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade'); // Ensure this matches your Admin migration
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
