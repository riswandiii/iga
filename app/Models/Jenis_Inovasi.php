<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Inovasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ketable inovasi pemerintahan daerah
    public function inovasi_pemerintahan_daerah()
    {
        return $this->hasMany(Inovasi_Pemerintah_Daerah::class);
    }

    // relasi ketable inovasi masyarakat
    public function inovasiMasyarakat()
    {
        return $this->hasMany(InovasiMasyarakat::class);
    }
    
}