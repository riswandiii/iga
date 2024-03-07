<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalKematangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['inovasi_pemerintah_daerah', 'inovasiMasyarakat'];

    // Relasi ketable inovasi pemerintah daerah
    public function inovasi_pemerintah_daerah()
    {
        return $this->belongsTo(Inovasi_Pemerintah_Daerah::class);
    }

    // Relasi ketabel inovasi masyarakat
    public function inovasiMasyarakat()
    {
        return $this->belongsTo(InovasiMasyarakat::class);
    }

}
