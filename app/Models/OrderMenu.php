<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMenu extends Model
{
    use HasFactory;

    protected $table = 'order_menu'; // Nama tabel

    // Disable timestamps jika tidak diperlukan
    public $timestamps = true;

    // Definisikan kolom yang bisa diisi
    protected $fillable = [
        'order_id',
        'menu_id',
    ];
}
