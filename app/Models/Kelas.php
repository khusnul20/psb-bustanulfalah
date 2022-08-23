<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    // use HasFactory;

    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'kelas', 'madrasah'];


    public function santri()
    {
        return $this->hasMany(User::class, 'id_kelas');
    }
}
