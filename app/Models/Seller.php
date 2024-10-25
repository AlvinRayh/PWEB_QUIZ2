<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'password', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // Relasi dengan order melalui stocks dan menus
    public function orders()
    {
        return $this->hasManyThrough(
            Order::class, 
            Stock::class, 
            'seller_id', // Foreign key di tabel stocks
            'id',        // Primary key di tabel orders
            'id',        // Primary key di tabel sellers
            'menu_id'    // Foreign key di tabel stocks
        );
    }
}
