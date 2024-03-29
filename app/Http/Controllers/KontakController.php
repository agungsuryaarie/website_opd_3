<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Halaman;
use App\Models\Layanan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $title = 'Kontak - Website Resmi Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hidup | Kabupaten Batu Bara';
        $setting = Setting::first();
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        return view('kontak', compact('title', 'setting', 'halaman', 'layanan'));
    }
}
