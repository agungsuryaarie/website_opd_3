<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class VideoController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Video';
        $video = Video::latest()->paginate(5);

        return view('admin.video.index', compact('tittle', 'menu', 'video'));
    }
    public function create()

    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Tambah Video';

        return view('admin.video.create', compact('tittle', 'menu'));
    }


    public function store(Request $request, Video $video)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'judul.required' => 'Judul harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'url.required' => 'Url harus diisi.',

        );

        //validate form
        $validator = Validator::make($request->all(), [
            'judul'     => 'required|max:300',
            'deskripsi'   => 'required',
            'url'   => 'required|max:300'
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //create post
        $video->create([
            'judul'     => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi'   => $request->deskripsi,
            'url'   => $request->url,
            'tanggal' => date('Y-m-d'),
        ]);

        //redirect to index
        return redirect()->route('video.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit($id)
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Edit Video';
        $video = Video::find($id);

        return view('admin.video.edit', compact('tittle', 'menu', 'video'));
    }

    public function update($id, Request $request)
    {

        $video = Video::find($id);

        //Translate Bahasa Indonesia
        $message = array(
            'judul.required' => 'Judul harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'url.required' => 'Url harus diisi.',

        );

        //validate form
        $validator = Validator::make($request->all(), [
            'judul'     => 'required|max:300',
            'deskripsi'   => 'required',
            'url'   => 'required|max:300'
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //update video post
        $video->update([
            'judul'     => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi'   => $request->deskripsi,
            'url'   => $request->url,
        ]);

        //redirect to index
        return redirect()->route('video.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        //redirect to index
        return redirect()->route('video.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
