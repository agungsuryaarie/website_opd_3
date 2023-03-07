<?php

namespace App\Http\Controllers;

use App\Models\Filedownload;
use App\Models\Halaman;
use App\Models\Layanan;
use App\Models\Setting;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $download = Filedownload::latest()->paginate(5);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('download', compact(
            'title',
            'download',
            'halaman',
            'layanan',
            'setting'
        ));
    }
}
