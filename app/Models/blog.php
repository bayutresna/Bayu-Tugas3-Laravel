<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $guarded = ["id"];

    public $fillable = [
        'penulis',
        'judul',
        'konten',
        'foto',
    ];
    protected $table='Blogs';
}
