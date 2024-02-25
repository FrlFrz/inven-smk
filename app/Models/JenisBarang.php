<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_jenis',
        'kode_jenis',
        'keterangan',
    ];
}
