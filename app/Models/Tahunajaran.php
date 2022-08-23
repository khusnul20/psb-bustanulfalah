<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tahunajaran extends Model
{
    // use HasFactory;

    protected $table = "tahunajaran";
    protected $primaryKey = "id";
    protected $fillable = ['tahun_ajaran'];


    public function user()
    {
        return $this->hasMany(User::class);
    }
}
