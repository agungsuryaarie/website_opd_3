<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $primaryKey = "id";

    protected $fillable = [
        'id', 'judul', 'slug', 'cover', 'tanggal', 'jam'
    ];

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
