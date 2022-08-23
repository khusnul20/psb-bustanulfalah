<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    // use HasFactory;
    protected $table = "bukti";
    protected $primaryKey = "id";
    protected $fillable = ['foto', 'tanggal_tf', 'waktu_tf', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
