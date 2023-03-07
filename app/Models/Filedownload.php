<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filedownload extends Model
{
    use HasFactory;
    protected $table = 'Filedownload';

    protected $fillable = [
        'nama_file', 'lampiran', 'tanggalfile', 'tanggalpos'
    ];
}
