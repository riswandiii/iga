<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['indikator'];
    
    // Relasi ketabel indikator
    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }

    // relasi ketabel kematangan
    public function kematangan()
    {
        return $this->hasMany(Kematangan::class);
    }

    
}
