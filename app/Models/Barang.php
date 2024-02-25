<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_barang',
        'path_foto',
        'kondisi_barang',
        'keterangan',
        'jumlah_barang',
        'id_jenis',
        'id_ruang',
        'kode_barang',
        'keterangan',
    ];
}
