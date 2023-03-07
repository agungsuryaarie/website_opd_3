<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';

    protected $fillable = [
        'urutan', 'kategori', 'judul', 'slug', 'isi_layanan', 'gambar', 'tanggal', 'jam'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
