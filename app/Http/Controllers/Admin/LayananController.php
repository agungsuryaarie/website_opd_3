<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class LayananController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Layanan';
        $layanan = Layanan::latest()->paginate(5);

        return view('admin.layanan.index', compact('tittle', 'menu', 'layanan'));
    }

    public function create()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Tambah menu Layanan';

        return view('admin.layanan.create', compact('tittle', 'menu'));
    }

    public function store(Request $request, Layanan $layanan)
    {
        //validate form
        $this->validate($request, [
            'urutan' => 'required',
            'judul' => 'required|string|max:200',
            'isi_layanan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //upload image
        $img = $request->file('gambar');
        $img->storeAs('public/layanan', $img->hashName());

        //create post
        $layanan->create([
            'urutan' => $request->urutan,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi_layanan' => $request->isi_layanan,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'gambar' => $img->hashName(),
        ]);
        //redirect to index
        return redirect()->route('layanan.index')->with(['success' => 'Data Berhasil Disimpan ke Database!']);
    }

    public function show(Layanan $layanan)
    {
        return view('admin.halaman.show', compact('halaman'));
    }

    public function edit($id)
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Edit menu Profile';
        $layanan = Layanan::find($id);

        return view('admin.layanan.edit', compact('tittle', 'menu', 'layanan'));
    }

    public function update($id, Request $request)
    {
        $layanan = Layanan::find($id);
        //validate form
        $this->validate($request, [
            'urutan' => 'required',
            'judul' => 'required|string|max:200',
            'isi_layanan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload image
            $img = $request->file('gambar');
            $img->storeAs('public/layanan', $img->hashName());

            //delete old image
            Storage::delete('public/layanan/' . $layanan->gambar);

            //update Halaman with new image
            $layanan->update([
                'urutan' => $request->urutan,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'isi_layanan' => $request->isi_layanan,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'gambar' => $img->hashName(),
            ]);
        } else {
            //update Halaman without image
            $layanan->update([
                'urutan' => $request->urutan,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'isi_layanan' => $request->isi_layanan,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
            ]);


            //redirect to index
            return redirect()->route('layanan.index')->with(['success' => 'Data Berhasil Disimpan ke Database!']);
        }
    }

    public function destroy($id)
    {

        $layanan = Layanan::find($id);
        //delete image
        Storage::delete('public/layanan/' . $layanan->gambar);

        //delete berita
        $layanan->delete();

        //redirect to index
        return redirect()->route('layanan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
