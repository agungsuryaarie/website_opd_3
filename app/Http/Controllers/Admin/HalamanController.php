<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HalamanController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Profile';
        $halaman = Halaman::latest()->paginate(5);

        return view('admin.halaman.index', compact('tittle', 'menu', 'halaman'));
    }

    public function create()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Tambah menu Profile';

        return view('admin.halaman.create', compact('tittle', 'menu'));
    }

    public function store(Request $request, Halaman $halaman)
    {
        //validate form
        $this->validate($request, [
            'urutan' => 'required',
            'judul' => 'required|string|max:200',
            'isi_halaman' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //upload image
        $img = $request->file('gambar');
        $img->storeAs('public/halaman', $img->hashName());

        //create post
        $halaman->create([
            'urutan' => $request->urutan,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi_halaman' => $request->isi_halaman,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'gambar' => $img->hashName(),
        ]);
        //redirect to index
        return redirect()->route('halaman.index')->with(['success' => 'Data Berhasil Disimpan ke Database!']);
    }

    public function show(Halaman $halaman)
    {
        return view('admin.halaman.show', compact('halaman'));
    }

    public function edit($id)
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Edit menu Profile';
        $halaman = Halaman::find($id);

        return view('admin.halaman.edit', compact('tittle', 'menu', 'halaman'));
    }

    public function update($id, Request $request)
    {
        $halaman = Halaman::find($id);
        //validate form
        $this->validate($request, [
            'urutan' => 'required',
            'judul' => 'required|string|max:200',
            'isi_halaman' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload image
            $img = $request->file('gambar');
            $img->storeAs('public/halaman', $img->hashName());

            //delete old image
            Storage::delete('public/halaman/' . $halaman->gambar);

            //update Halaman with new image
            $halaman->update([
                'urutan' => $request->urutan,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'isi_halaman' => $request->isi_halaman,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'gambar' => $img->hashName(),
            ]);
        } else {
            //update Halaman without image
            $halaman->update([
                'urutan' => $request->urutan,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'isi_halaman' => $request->isi_halaman,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
            ]);


            //redirect to index
            return redirect()->route('halaman.index')->with(['success' => 'Data Berhasil Disimpan ke Database!']);
        }
    }

    public function destroy($id)
    {

        $halaman = Halaman::find($id);
        //delete image
        Storage::delete('public/halaman/' . $halaman->gambar);

        //delete berita
        $halaman->delete();

        //redirect to index
        return redirect()->route('halaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
