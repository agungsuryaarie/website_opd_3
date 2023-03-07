<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'foto';
    protected $primaryKey = "id";

    protected $fillable = [
        'id', 'galeri_id', 'foto'
    ];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class);
    }
}
