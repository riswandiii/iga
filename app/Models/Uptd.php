<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uptd extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['opd'];

    // Relasi ketable opd
    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }
}
