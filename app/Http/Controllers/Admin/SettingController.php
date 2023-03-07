<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class SettingController extends Controller
{

    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Setting Profil Instansi';
        $setting = Setting::first();

        return view('admin.setting.index', compact('tittle', 'menu', 'setting'));
    }

    public function create(Request $request)

    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Isi Data';
        return view('admin.setting.create', compact('tittle', 'menu'));
    }

    public function store(Request $request, Setting $setting)
    {
        // dd($request->all());
        //Translate Bahasa Indonesia
        $message = array(
            'nama_instansi.required' => 'Nama Instansi harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'telepon.required' => 'Telepon harus diisi.',
            'email.required' => 'Email harus diisi.',
            'url.required' => 'Url harus diisi.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.images' => 'File harus image.',
            'gambar.mimes' => 'Foto harus jpeg,png,jpg.',
            'gambar.max' => 'File maksimal 1MB.',
        );
        //validate form
        $validator = Validator::make($request->all(), [
            'nama_instansi' => 'required|string|max:255',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'url' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //check if image & logo is uploaded
        if ($request->hasFile('gambar')) {
            // upload new image and new logo
            $img = $request->file('gambar');
            $img->storeAs('public/setting', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/setting/' . $setting->gambar);
            // update sambutan with img & logo
            $setting->create([
                'nama_instansi' => $request->nama_instansi,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'email' => $request->email,
                'url' => $request->url,
                'gambar' => $img->hashName(),
            ]);
        }

        //redirect to index
        return redirect()->route('setting.index')->with(['success' => 'Data Berhasil DiTambahkan!']);
    }

    public function edit(Request $request, Setting $setting)
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Edit Profil Instansi';
        $setting = Setting::first();
        return view('admin.setting.edit', compact('tittle', 'menu', 'setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        //Translate Bahasa Indonesia
        $message = array(
            'nama_instansi.required' => 'Nama Instansi harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'telepon.required' => 'Telepon harus diisi.',
            'email.required' => 'Email harus diisi.',
            'url.required' => 'Url harus diisi.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.images' => 'File harus image.',
            'gambar.mimes' => 'Foto harus jpeg,png,jpg.',
            'gambar.max' => 'File maksimal 1MB.',
        );
        //validate form
        $this->validate($request, [
            'nama_instansi' => 'required|string|max:255',
            'alamat' => 'required|max:255',
            'telepon' => 'required',
            'email' => 'required',
            'url' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:1024',
        ], $message);
        //check if image & logo is uploaded
        if ($request->hasFile('gambar')) {
            // upload new image and new logo
            $img = $request->file('gambar');
            $img->storeAs('public/setting', $img->hashName());
            // delete old image and old logo
            Storage::delete('public/setting/' . $setting->gambar);
            // update sambutan with img & logo
            $setting->update([
                'nama_instansi' => $request->nama_instansi,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'email' => $request->email,
                'url' => $request->url,
                'gambar' => $img->hashName(),
            ]);
        } else {
            //update sambutan without image img & logo
            $setting->update([
                'nama_instansi' => $request->nama_instansi,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'email' => $request->email,
                'url' => $request->url,
            ]);
        }
        //redirect to index
        return redirect()->route('setting.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
