<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus'; // Nama tabel

     // Tambahkan kolom yang dapat diisi secara massal
     protected $fillable = [
        'name',
        'price',
        'stock',
        'image', // Atribut image


    ];
}