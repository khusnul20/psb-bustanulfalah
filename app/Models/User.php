<?php

namespace App\Models;

use App\Models\Bukti;
use App\Models\Kelas;
use App\Models\NilaiKitab;
use App\Models\Tahunajaran;
use App\Models\NilaiAlquran;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_kelas',
        'tahunajaran_id',
        'no_pend',
        'nisn',
        'name',
        'tanggalLahir',
        'tempatLahir',
        'anakKe',
        'jumlahSaudara',
        'image',
        'foto_kk',
        'jenisKelamin',
        'nameAyah',
        'pekerjaanAyah',
        'penghasilanAyah',
        'noAyah',
        'alamatAyah',
        'nameIbu',
        'pekerjaanIbu',
        'penghasilanIbu',
        'noIbu',
        'alamatIbu',
        'email',
        'password'
    ];


    public function tahunAjaran()
    {
        return $this->belongsTo(Tahunajaran::class, 'tahunajaran_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function nilaiAlquran()
    {
        return $this->hasMany(NilaiAlquran::class, 'user_id');
    }

    public function nilaiKitab()
    {
        return $this->hasMany(NilaiKitab::class, 'user_id');
    }

    public function bukti()
    {
        return $this->hasMany(Bukti::class, 'user_id');
    }





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
    ];
}
