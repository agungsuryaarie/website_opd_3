<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slideshow;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SlideshowController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Slideshow';
        $slideshow = Slideshow::latest()->get();

        return view('admin.slideshow.index', compact('tittle', 'menu', 'slideshow'));
    }

    public function store(Request $request, Slideshow $slideshow)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'judul.required' => 'Judul harus diisi.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.images' => 'File harus image.',
            'gambar.mimes' => 'Foto harus jpeg,png,jpg.',
            'gambar.max' => 'File maksimal 1MB.',
        );
        //validate form
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //check if image & logo is uploaded
        if ($request->hasFile('gambar')) {
            // upload new image and new logo
            $img = $request->file('gambar');
            $img->storeAs('public/slideshow', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/slideshow/' . $slideshow->gambar);
            // update berita with img & logo
            $slideshow->create([
                'judul' => $request->judul,
                'gambar' => $img->hashName(),
            ]);
        }
        //redirect to index
        return redirect()->route('slideshow.index')->with(['success' => 'Data Berhasil DiTambahkan!']);
    }


    public function update(Request $request, Slideshow $slideshow)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'judul.required' => 'Judul harus diisi.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.images' => 'File harus image.',
            'gambar.mimes' => 'Foto harus jpeg,png,jpg.',
            'gambar.max' => 'File maksimal 1MB.',
        );
        //validate form
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        //check if image & logo is uploaded
        if ($request->hasFile('gambar')) {
            // upload new image and new logo
            $img = $request->file('gambar');
            $img->storeAs('public/slideshow', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/slideshow/' . $slideshow->gambar);
            // update sambutan with img & logo
            $slideshow->update([
                'judul' => $request->judul,
                'gambar' => $img->hashName(),
            ]);
        } else {
            //update slideshow without image img & logo
            $slideshow->update([
                'judul' => $request->judul,
            ]);
        }
        //redirect to index
        return redirect()->route('slideshow.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(SLideshow $slideshow)
    {

        //delete image
        Storage::delete('public/slideshow/' . $slideshow->gambar);

        //delete slideshow
        $slideshow->delete();

        //redirect to index
        return redirect()->route('slideshow.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
