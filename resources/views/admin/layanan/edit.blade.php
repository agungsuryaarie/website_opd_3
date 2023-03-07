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
                        <form action="{{ route('layanan.update', $layanan->id) }}"
                            method="POST"enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Urutan<span class="text-danger"> *</span></label>
                                            <input class="form-control @error('urutan') is-invalid @enderror" type="number"
                                                name="urutan" value="{{ old('urutan', $layanan->urutan) }}" placeholder=""
                                                autocomplete="off">
                                            @error('urutan')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Menu<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul', $layanan->judul) }}" placeholder="Judul">
                                    @error('judul')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Isi<span class="text-danger"> *</span></label>
                                    <textarea id="texteditor1" class="@error('isi_layanan') error @enderror" name="isi_layanan">
                                        {{ old('isi_layanan', $layanan->isi_layanan) }}
                                    </textarea>
                                    @error('isi_layanan')
                                        <div class="text-danger text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar<span class="text-danger">*</span></label><br>
                                    <img src="{{ url('storage/layanan/' . $layanan->gambar) }}" style="width: 300px">
                                </div>
                                <div class="form-group">
                                    <label>Ganti Gambar<span class="text-danger"> *</span></label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        type="text" name="gambar" accept=".jpg, .jpeg, .png">
                                    @error('gambar')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('layanan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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
