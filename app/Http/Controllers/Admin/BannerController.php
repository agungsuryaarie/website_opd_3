<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Banner';
        $banner = Banner::latest()->get();

        return view('admin.banner.index', compact('tittle', 'menu', 'banner'));
    }

    public function store(Request $request, Banner $banner)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'nama.required' => 'Nama harus diisi.',
            'url.required' => 'Link URL harus diisi.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.images' => 'File harus image.',
            'gambar.mimes' => 'Foto harus jpeg,png,jpg.',
            'gambar.max' => 'File maksimal 1MB.',
        );
        //validate form
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //check if image & logo is uploaded
        if ($request->hasFile('gambar')) {
            // upload new image and new logo
            $img = $request->file('gambar');
            $img->storeAs('public/banner', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/banner/' . $banner->gambar);
            // update berita with img & logo
            $banner->create([
                'nama' => $request->nama,
                'url' => $request->url,
                'gambar' => $img->hashName(),
            ]);
        }
        //redirect to index
        return redirect()->route('banner.index')->with(['success' => 'Data Berhasil DiTambahkan!']);
    }

    public function update(Request $request, Banner $banner)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'nama.required' => 'Nama harus diisi.',
            'url.required' => 'Link URL harus diisi.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.images' => 'File harus image.',
            'gambar.mimes' => 'Foto harus jpeg,png,jpg.',
            'gambar.max' => 'File maksimal 1MB.',
        );
        //validate form
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        //check if image & logo is uploaded
        if ($request->hasFile('gambar')) {
            // upload new image and new logo
            $img = $request->file('gambar');
            $img->storeAs('public/banner', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/banner/' . $banner->gambar);
            // update banner with img & logo
            $banner->update([
                'nama' => $request->nama,
                'url' => $request->url,
                'gambar' => $img->hashName(),
            ]);
        } else {
            //update banner without image img & logo
            $banner->update([
                'nama' => $request->nama,
                'url' => $request->url,
            ]);
        }
        //redirect to index
        return redirect()->route('banner.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Banner $banner)
    {

        //delete image
        Storage::delete('public/banner/' . $banner->gambar);

        //delete slideshow
        $banner->delete();

        //redirect to index
        return redirect()->route('banner.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
