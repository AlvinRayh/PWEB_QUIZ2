<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        // Contoh migrasi untuk tabel customers
Schema::create('customers', function (Blueprint $table) {
    $table->id(); // Pastikan ini adalah kunci utama
    $table->string('name');
    $table->string('email')->unique();
    $table->integer('phone_number');
    $table->char('password', 7);
    $table->timestamps();
});
     
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
