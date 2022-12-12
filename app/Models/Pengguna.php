<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class pengguna extends Model
{
    public $guarded = ["id"];
    use HasFactory;
    protected $table='Pengguna';


    protected static function boot()
    {
        parent::boot();

        static::creating (function(Pengguna $pengguna){
            $pengguna->password = hash::make($pengguna->password);
        });

        static::updating (function(Pengguna $pengguna){
            if($pengguna->isDirty(['password'])){
                $pengguna->password = hash::make($pengguna->password);
            }
        });
    }

}
