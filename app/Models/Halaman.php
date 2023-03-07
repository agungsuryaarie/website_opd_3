<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    use HasFactory;
    protected $table = 'halaman';

    protected $fillable = [
        'urutan', 'kategori', 'judul', 'slug', 'isi_halaman', 'gambar', 'tanggal', 'jam'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
