<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Slideshow;
use App\Models\Berita;
use App\Models\Link;
use App\Models\Halaman;
use App\Models\Layanan;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Website Resmi Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hidup | Kabupaten Batu Bara';
        $slideshow = Slideshow::orderBy('id', 'desc')->limit(3)->get();
        // $posts = Berita::orderBy('id', 'desc')->limit(3)->get();
        $link = Link::orderBy('id', 'desc')->get();
        $banner = Banner::orderBy('id', 'desc')->limit(1)->get();
        $post_dinas = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Dinas')->limit(1)->get();
        $post_pemerintahan = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Pemerintahan')->limit(1)->get();
        $post_pemerintahan2 = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Pemerintahan')->offset(1)->limit(2)->get();
        $post_pemerintahan3 = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Pemerintahan')->offset(3)->limit(2)->get();
        $post_umum = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Umum')->limit(6)->get();
        $post_latest = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Dinas')->offset(1)->limit(5)->get();
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('home', compact(
            'title',
            'slideshow',
            'link',
            'banner',
            'post_dinas',
            'post_latest',
            'post_pemerintahan',
            'post_pemerintahan2',
            'post_pemerintahan3',
            'post_umum',
            'halaman',
            'layanan',
            'setting'

        ));
    }
}
