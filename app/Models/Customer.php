<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi (mass assignment).
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
    ];
}

