<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = ['nama', 'nim', 'prodi', 'no_hp', 'departemen_id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
