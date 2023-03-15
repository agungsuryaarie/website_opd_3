<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Foto;
use App\Models\Berita;
use App\Models\Halaman;
use App\Models\Layanan;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\Video;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $title = 'Galeri Foto - Website Resmi Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hidup | Kabupaten Batu Bara';
        $foto = Galeri::orderBy('id', 'desc')->latest()->paginate(9);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('foto', compact('title', 'foto', 'halaman', 'layanan', 'setting'));
    }

    public function show($id)
    {
        $title = 'Galeri Foto - Website Resmi Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hidup | Kabupaten Batu Bara';
        $foto = Galeri::orderBy('id', 'desc')->first();
        $detail = Foto::where('galeri_id', $id)->get();
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('foto_show', compact('title', 'detail', 'halaman', 'layanan', 'setting', 'foto'));
    }

    public function video()
    {
        $title = 'Video - Website Resmi Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hidup | Kabupaten Batu Bara';
        $video = Video::orderBy('id', 'desc')->latest()->paginate(9);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('video', compact('title', 'video', 'setting', 'halaman', 'layanan'));
    }
    public function showv(Video $video)
    {
        $title = 'Video - Website Resmi Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hidup | Kabupaten Batu Bara';
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $other_post = Berita::orderBy('id', 'desc')->get();
        $other_video = Video::limit(4)->get();
        $banner = Banner::orderBy('id', 'desc')->limit(1)->get();
        $setting = Setting::first();
        return view('video_show', compact('title', 'video', 'halaman', 'other_post', 'layanan', 'banner', 'setting', 'other_video'));
    }
}
