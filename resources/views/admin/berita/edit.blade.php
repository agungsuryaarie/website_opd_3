@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $menu }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $menu }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('berita.update', $berita->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kategori<span class="text-danger"> *</span></label>
                                            <select class="form-control select2bs4 " type="text" name="kategori"
                                                value="{{ old('kategori', $berita->kategori) }}" style="width: 100%;">
                                                <option selected="selected" disabled>.::Pilih Kategori::.</option>
                                                <option value="Dinas"@if ($berita->kategori == 'Dinas') selected @endif>
                                                    Dinas</option>
                                                <option
                                                    value="Pemerintahan"@if ($berita->kategori == 'Pemerintahan') selected @endif>
                                                    Pemerintahan</option>
                                                <option value="Umum"@if ($berita->kategori == 'Umum') selected @endif>Umum
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Judul<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul', $berita->judul) }}">
                                    @error('judul')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Isi berita<span class="text-danger"> *</span></label>
                                    <textarea id="texteditor1" class="@error('isi') error @enderror" name="isi">
                                        {{ old('isi', $berita->isi) }}"
                                    </textarea>
                                    @error('isi')
                                        <div class="text-danger text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Foto<span class="text-danger">*</span></label><br>
                                    <img src="{{ url('storage/berita/' . $berita->foto) }}" style="width: 234px;">
                                </div>
                                <div class="form-group">
                                    <label>Ganti Foto<span class="text-danger"> *</span></label>
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        type="text" name="foto" accept=".jpg, .jpeg, .png">
                                    @error('foto')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('berita.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $(function() {
            // Summernote
            $('#texteditor1').summernote()
        })
        $(function() {
            // Summernote
            $('#texteditor2').summernote()
        })
    </script>
@endsection
