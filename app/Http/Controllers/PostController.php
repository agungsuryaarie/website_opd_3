<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Halaman;
use App\Models\Layanan;
use App\Models\Setting;
use App\Models\Banner;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $title2 = 'Semua Berita';
        $pagination = 9;
        $post = Berita::orderBy('id', 'desc')->latest()->paginate($pagination);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('post', compact('post', 'title', 'title2', 'halaman', 'layanan', 'setting'));
    }

    public function show(Berita $post)
    {
        $title = $post->title;
        $recent_post = Berita::limit(4)->get();
        $banner = Banner::orderBy('id', 'desc')->limit(1)->get();
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('post_show', compact('title', 'post', 'recent_post', 'halaman', 'layanan', 'setting', 'banner'));
    }

    public function dinas()
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $title2 = 'Kategori Dinas';
        $pagination = 9;
        $post_dinas = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Dinas')->latest()->paginate($pagination);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('post_dinas', compact('post_dinas', 'title', 'title2', 'halaman', 'layanan', 'setting'));
    }

    public function pemerintahan()
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $title2 = 'Kategori Pemerintahan';
        $pagination = 9;
        $post_pemerintahan = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Pemerintahan')->latest()->paginate($pagination);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('post_pemerintahan', compact('post_pemerintahan', 'title', 'title2', 'halaman', 'layanan', 'setting'));
    }

    public function umum()
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $title2 = 'Kategori Umum';
        $pagination = 9;
        $post_umum = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Umum')->latest()->paginate($pagination);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('post_umum', compact('post_umum', 'title', 'title2', 'halaman', 'layanan', 'setting'));
    }
}
