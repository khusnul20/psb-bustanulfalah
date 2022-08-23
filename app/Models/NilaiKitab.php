<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKitab extends Model
{
    // use HasFactory;

    protected $table = "nilai_kitab";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'user_id', 'kelancaran_membaca', 'wawancara', 'penempatan_tajwid', 'hasil'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
