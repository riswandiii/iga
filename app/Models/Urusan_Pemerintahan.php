<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urusan_Pemerintahan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ketable inovasi pemerintahan daerah
    public function inovasi_pemerintahan_daerah()
    {
        return $this->hasMany(Inovasi_Pemerintah_Daerah::class);
    }

    // Relasi ketabel inovasi masyarakat
    public function inovasiMasyarakat()
    {
        return $this->belongsTo(InovasiMasyarakat::class);
    }

}
