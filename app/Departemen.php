<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $fillable = ['nama_departemen', 'program_kerja'];

    public function kadep()
    {
        return $this->hasOne(Kadep::class);
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
}
