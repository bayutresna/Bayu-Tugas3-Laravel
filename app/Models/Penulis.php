<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    public $guarded = ["id"];

    public $fillable = [
        'nama',
        'username',
        'password',
        'foto',
    ];
    protected $table='Produks';
}
