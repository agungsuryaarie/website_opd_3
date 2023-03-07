<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{

    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Berita';
        $berita = Berita::latest()->paginate(5);

        return view('admin.berita.index', compact('tittle', 'menu', 'berita'));
    }
    public function create()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Tambah Berita';
        // $appsetting = AppSetting::first();

        return view('admin.berita.create', compact('tittle', 'menu'));
    }
    public function store(Request $request, Berita $berita)
    {
        //validate form
        $this->validate($request, [
            'kategori' => 'required',
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/berita', $foto->hashName());

        //create post
        $berita->create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'foto' => $foto->hashName(),
        ]);
        //redirect to index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan ke Database!']);
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Edit Berita';
        $berita = Berita::find($id);

        return view('admin.berita.edit', compact('tittle', 'menu', 'berita'));
    }

    public function update($id, Request $request)
    {
        $berita = Berita::find($id);
        //validate form
        $this->validate($request, [
            'kategori' => 'required',
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        //check if image is uploaded
        if ($request->hasFile('foto')) {

            //upload image
            $foto = $request->file('foto');
            $foto->storeAs('public/berita', $foto->hashName());

            //delete old image
            Storage::delete('public/berita/' . $berita->foto);

            //update post with new image
            $berita->update([
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'isi' => $request->isi,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'foto' => $foto->hashName(),
            ]);
        } else {

            //update post without image
            $berita->update([
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'isi' => $request->isi,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
            ]);
            //redirect to index
            return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan ke Database!']);
        }
    }

    public function destroy($id)
    {

        $berita = Berita::find($id);
        //delete image
        Storage::delete('public/berita/' . $berita->foto);

        //delete berita
        $berita->delete();

        //redirect to index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
