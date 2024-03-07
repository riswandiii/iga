<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inovasi_Pemerintah_Daerah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user', 'tahapan_inovasi', 'inisiator_inovasi_daerah', 'jenis_inovasi', 'bentuk_inovasi_daerah', 'tematik', 'urusan_utama', 'urusan_lain' ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_inovasi', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['tahapan'] ?? false, function($query, $tahapan){
            return $query->whereHas('tahapan_inovasi', function($query) use ($tahapan){
                $query->where('tahapan', $tahapan);
            });
        });
    }


    // relasi ketabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi ketable tahapan inovasi
    public function tahapan_inovasi()
    {
        return $this->belongsTo(Tahapan_Inovasi::class);
    }

    // relasi ketable inisiator inovadi daerah
    public function inisiator_inovasi_daerah()
    {
        return $this->belongsTo(Inisiator_Inovasi_Daerah::class);
    }

    // relasi ketable jenis inovasi
    public function jenis_inovasi()
    {
        return $this->belongsTo(Jenis_Inovasi::class);
    }

    // relasi ketable bentuk inovasi daerah
    public function bentuk_inovasi_daerah()
    {
        return $this->belongsTo(Bentuk_Inovasi_Daerah::class);
    }

    // relasi ketable tematik
    public function tematik()
    {
        return $this->belongsTo(Tematik::class);
    }

    // relasi ketable urusan pemerintahan / urusan utama
    public function urusan_utama()
    {
        return $this->belongsTo(Urusan_Pemerintahan::class);
    }

    // relsai ketable urusan lain
    public function urusan_lain()
    {
        return $this->belongsTo(Urusan_Lain::class);
    }

    // Relasi ketabel kematangan
    public function kematangan()
    {
        return $this->hasMany(Kematangan::class);
    }

    // Relasi ketabel total kematangan
    public function total_kematangan()
    {
        return  $this->belongsTo(TotalKematangan::class);
    }

    // Relasi ketabel total data pendukung
    public function data_pendukung()
    {
        return  $this->hasMany(Data_Pendukung::class);
    }

}
