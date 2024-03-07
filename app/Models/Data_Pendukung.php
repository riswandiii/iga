<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Pendukung extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['inovasi_pemerintah_darah', 'inovasiMasyarakat', 'indikator'];

     // Relasi ketabel inovasi pemerintah daerah
     public function inovasi_pemerintah_darah()
     {
         return  $this->belongsTo(Inovasi_Pemerintah_Daerah::class);
     }

     // Relasi ketabel inovasi masyarakat
     public function inovasiMasyarakat()
     {
         return  $this->belongsTo(InovasiMasyarakat::class);
     }

      // Relasi ketabel total indikator
      public function indikator()
      {
          return  $this->belongsTo(Indikator::class);
      }

}
