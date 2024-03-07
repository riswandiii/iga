<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ketabel uptd
    public function uptd()
    {
        return $this->hasMany(Uptd::class);
    }

    // Relasi ketable user
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
