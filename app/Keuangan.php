<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';
    protected $fillable = ['jumlah_bayar', 'tanggal_bayar', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
