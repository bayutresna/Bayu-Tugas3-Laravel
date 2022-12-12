<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $guarded = ["id"];

    public $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'foto',
    ];
    protected $table='Produks';
}
