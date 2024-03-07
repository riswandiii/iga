<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $guarded = ['id'];

    // relasi ketable inovasi pemerintah daerah
    public function inovasi_pemerintah_daerah()
    {
        return $this->hasMany(Inovasi_Pemerintah_Daerah::class);
    }

    // Relasi ketabel inovasi masyarakat
    public function inovasiMasyarakat()
    {
        return $this->belongsTo(InovasiMasyarakat::class);
    }

    // Relasi ke tabel opd
    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    // Relasi ke tabel inisiator
    public function inisiator()
    {
        return $this->belongsTo(Inisiator_Inovasi_Daerah::class);
    }

    // relasi ketable hitung mundur
    public function hitungMundur()
    {
        return $this->belongsTo(HitungMundur::class);
    }

}
