<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'judul',
        'kategori_id',
        'file_path',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

}
