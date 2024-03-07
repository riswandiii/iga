<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bentuk_Inovasi_Daerah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ketable inovasi pemerintahan daerah
    public function inovasi_pemerintahan_daerah()
    {
        return $this->hasMany(Inovasi_Pemerintah_Daerah::class);
    }

     // relasi ketable inovasi masyarakat
     public function InovasiMasyarakat()
     {
         return $this->hasMany(InovasiMasyarakat::class);
     }

}
