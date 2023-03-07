<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Galeri';
        $galeri = Galeri::latest()->get();

        return view('admin.galeri.index', compact('tittle', 'menu', 'galeri'));
    }

    public function store(Request $request, Galeri $galeri)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'judul.required' => 'Judul harus diisi.',
            'cover.required' => 'Cover harus diupload.',
            'cover.images' => 'File harus image.',
            'cover.mimes' => 'Foto harus jpeg,png,jpg.',
            'cover.max' => 'File maksimal 1MB.',
        );
        //validate form
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //check if image & logo is uploaded
        if ($request->hasFile('cover')) {
            // upload new image and new logo
            $img = $request->file('cover');
            $img->storeAs('public/galeri', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/galeri/' . $galeri->cover);
            // update berita with img & logo
            $galeri->create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'cover' => $img->hashName(),
            ]);
        }
        //redirect to index
        return redirect()->route('galeri.index')->with(['success' => 'Data Berhasil DiTambahkan!']);
    }

    public function update($id, Request $request)
    {

        $galeri = Galeri::find($id);
        //Translate Bahasa Indonesia
        $message = array(
            'judul.required' => 'Judul harus diisi.',
            'cover.required' => 'Cover harus diupload.',
            'cover.images' => 'File harus image.',
            'cover.mimes' => 'Foto harus jpeg,png,jpg.',
            'cover.max' => 'File maksimal 1MB.',
        );
        //validate form
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'cover' => 'image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        //check if image & logo is uploaded
        if ($request->hasFile('cover')) {
            // upload new image and new logo
            $img = $request->file('cover');
            $img->storeAs('public/galeri', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/galeri/' . $galeri->cover);
            // update sambutan with img & logo
            $galeri->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'cover' => $img->hashName(),
            ]);
        } else {
            //update Galeri without image img & logo
            $galeri->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
            ]);
        }
        //redirect to index
        return redirect()->route('galeri.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        //delete image
        Storage::delete('public/galeri/' . $galeri->gambar);

        //delete slideshow
        $galeri->delete();

        //redirect to index
        return redirect()->route('galeri.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


    public function tambah_foto($id)
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Tambah Foto';
        $galery = Galeri::where('id', $id)->first();
        $foto = Foto::where('galeri_id', $id)->get();
        return view('admin.galeri.tambah_foto', compact('tittle', 'menu', 'galery', 'foto'));
    }

    public function foto_store(Request $request, $id)
    {
        $message = array(
            'foto.required' => 'Foto harus diupload.',
            'foto.images' => 'File harus image.',
            'foto.mimes' => 'Foto harus jpeg,png,jpg.',
            'foto.max' => 'File maksimal 1MB.',
        );
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $img->storeAs('public/foto', $img->hashName());

            Foto::insert([
                'galeri_id' => $id,
                'foto' => $img->hashName(),
            ]);
        }
        return redirect()->route('galeri.tambah_foto', $id)->with(['success' => 'Data Berhasil DiTambahkan!']);
    }

    public function foto_destroy($galeri_id, $id)
    {
        $foto = Foto::find($id);
        //delete image
        Storage::delete('public/foto/' . $foto->foto);

        //delete slideshow
        $foto->delete();

        //redirect to index
        return redirect()->route('galeri.tambah_foto', $galeri_id)->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
