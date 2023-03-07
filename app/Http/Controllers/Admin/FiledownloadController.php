<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Filedownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FiledownloadController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'File Download';
        $filedownload = Filedownload::latest()->get();

        return view('admin.file-download.index', compact('tittle', 'menu', 'filedownload'));
    }

    public function store(Request $request, Filedownload $filedownload)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'nama_file.required' => 'Nama harus diisi.',
            'tanggalfile.required' => 'Tanggal harus diisi.',
            'lampiran.required' => 'Lampiran harus diupload.',
            // 'gambar.images' => 'File harus image.',
            'lampiran.mimes' => 'File harus doc,docx,pptx,pdf,txt,xlsx,xls',
            'file.max' => 'File maksimal 1MB.',
        );
        //validate form
        $validator = Validator::make($request->all(), [
            'nama_file' => 'required|string|max:255',
            'tanggalfile' => 'required|string|max:30',
            'lampiran' => 'required|mimes:doc,docx,pptx,pdf,txt,xlsx,xls|max:1024',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //check if file is uploaded
        if ($request->hasFile('lampiran')) {
            // upload new file
            $file = $request->file('lampiran');
            $file->storeAs('public/lampiran', $file->hashName());
            // delete old file
            Storage::delete('public/lampiran/' . $filedownload->lampiran);
            // update download with file
            $filedownload->create([
                'nama_file' => $request->nama_file,
                'tanggalfile' => $request->tanggalfile,
                'tanggalpos' => date('Y-m-d'),
                'lampiran' => $file->hashName(),
            ]);
        }
        //redirect to index
        return redirect()->route('file-download.index')->with(['success' => 'Data Berhasil DiTambahkan!']);
    }

    public function update(Request $request, Filedownload $filedownload)
    {

        //Translate Bahasa Indonesia
        $message = array(
            'nama_file.required' => 'Nama harus diisi.',
            'tanggalfile.required' => 'Tanggal harus diisi.',
            'lampiran.required' => 'Lampiran harus diupload.',
            // 'gambar.images' => 'File harus image.',
            'lampiran.mimes' => 'File harus doc,docx,pptx,pdf,txt,xlsx,xls',
            'file.max' => 'File maksimal 1MB.',
        );
        //validate form
        $this->validate($request, [
            'nama_file' => 'required|string|max:255',
            'tanggalfile' => 'required|string|max:30',
            'lampiran' => 'mimes:doc,docx,pptx,pdf,txt,xlsx,xls|max:1024',
        ], $message);
        //check if file is uploaded
        if ($request->hasFile('lampiran')) {
            // upload new file 
            $file = $request->file('lampiran');
            $file->storeAs('public/lampiran', $file->hashName());
            // delete old file
            Storage::delete('public/lampiran/' . $filedownload->lampiran);
            // update download with file
            $filedownload->update([
                'nama_file' => $request->nama_file,
                'tanggalfile' => $request->tanggalfile,
                'tanggalpos' => date('Y-m-d'),
                'lampiran' => $file->hashName(),
            ]);
        } else {
            //update download without file 
            $filedownload->update([
                'nama_file' => $request->nama_file,
                'tanggalfile' => $request->tanggalfile,
                'tanggalpos' => date('Y-m-d'),
            ]);
        }
        //redirect to index
        return redirect()->route('file-download.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Filedownload $filedownload)
    {

        //delete lampiran
        Storage::delete('public/lampiran/' . $filedownload->lampiran);

        //delete file
        $filedownload->delete();

        //redirect to index
        return redirect()->route('file-download.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
