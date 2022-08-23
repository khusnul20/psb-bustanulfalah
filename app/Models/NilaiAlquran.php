<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiAlquran extends Model
{
    // use HasFactory;

    protected $table = "nilai_alquran";
    protected $primaryKey = "id";
    protected $fillable = ['kelancaran_membaca', 'makhorijul_huruf', 'penempatan_tajwid', 'hasil', 'user_id',];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
