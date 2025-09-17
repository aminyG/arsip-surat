<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama', 'keterangan'];

    public function arsips()
    {
        return $this->hasMany(Arsip::class);
    }
}
