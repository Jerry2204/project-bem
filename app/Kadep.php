<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kadep extends Model
{
    protected $table = 'kadep';
    protected $fillable = ['nama', 'user_id', 'nim', 'alamat', 'no_hp', 'departemen_id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
