<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['indikator', 'parameter', 'inovasi_pemerintah_daerah', 'inovasiMasyarakat'];

    // Relasi ketabel indikator
    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }

    // Relasi ketable parameter
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }

    // Relasi ketabel inovasi pemerintah daerah
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
