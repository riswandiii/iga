<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ketabel parameter
    public function parameter()
    {
        return $this->hasMany(Parameter::class);
    }

    // Relasi ketabel kematangan
        public function kematangan()
    {
        return $this->hasMany(Kematangan::class);
    }

     // Relasi ketabel total data pendukung
     public function data_pendukung()
     {
         return  $this->hasMany(Data_Pendukung::class);
     }

}
