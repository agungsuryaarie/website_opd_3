<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Link Terkait';
        $link = Link::latest()->get();

        return view('admin.link.index', compact('tittle', 'menu', 'link'));
    }

    public function store(Request $request, Link $link)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'nama.required' => 'Nama harus diisi.',
            'link_url.required' => 'Link URL harus diisi.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.images' => 'File harus image.',
            'gambar.mimes' => 'Foto harus jpeg,png,jpg.',
            'gambar.max' => 'File maksimal 1MB.',
        );
        //validate form
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:200',
            'link_url' => 'required|string|max:200',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //check if image & logo is uploaded
        if ($request->hasFile('gambar')) {
            // upload new image and new logo
            $img = $request->file('gambar');
            $img->storeAs('public/link', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/link/' . $link->gambar);
            // update berita with img & logo
            $link->create([
                'nama' => $request->nama,
                'link_url' => $request->link_url,
                'gambar' => $img->hashName(),
            ]);
        }
        //redirect to index
        return redirect()->route('link.index')->with(['success' => 'Data Berhasil DiTambahkan!']);
    }

    public function update(Request $request, Link $link)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'nama.required' => 'Nama harus diisi.',
            'link_url.required' => 'Link URL harus diisi.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.images' => 'File harus image.',
            'gambar.mimes' => 'Foto harus jpeg,png,jpg.',
            'gambar.max' => 'File maksimal 1MB.',
        );
        //validate form
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:200',
            'link_url' => 'required|string|max:200',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //check if image & logo is uploaded
        if ($request->hasFile('gambar')) {
            // upload new image and new logo
            $img = $request->file('gambar');
            $img->storeAs('public/link', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/link/' . $link->gambar);
            // update berita with img & logo
            $link->update([
                'nama' => $request->nama,
                'link_url' => $request->link_url,
                'gambar' => $img->hashName(),
            ]);
        } else {
            //update link without image img & logo
            $link->update([
                'nama' => $request->nama,
                'link_url' => $request->link_url,
            ]);
        }
        //redirect to index
        return redirect()->route('link.index')->with(['success' => 'Data Berhasil DiTambahkan!']);
    }

    public function destroy(Link $link)
    {

        //delete image
        Storage::delete('public/link/' . $link->gambar);

        //delete slideshow
        $link->delete();

        //redirect to index
        return redirect()->route('link.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
