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
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Dashboard</a></li>
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
                        <!-- form start -->
                        <form method="POST"
                            action="{{ route('setting.update', $setting->id) }}"enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Instansi<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_instansi') is-invalid @enderror"
                                        name="nama_instansi" placeholder="Nama Instansi" autocomplete="off"
                                        value="{{ old('nama_instansi', $setting->nama_instansi) }}">
                                    @error('nama_aplikasi')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Url Website<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control  @error('url') is-invalid @enderror"
                                        name="url" placeholder="Url Website" autocomplete="off"
                                        value="{{ old('url', $setting->url) }}">
                                    @error('url')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat<span class="text-danger"> *</span></label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat"
                                        autocomplete="off" value="{{ old('alamat', $setting->alamat) }}" rows="3" placeholder="Alamat">
                                    </textarea>
                                    @error('alamat')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Telepon<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control  @error('telepon') is-invalid @enderror"
                                        name="telepon" placeholder="Telepon" autocomplete="off"
                                        value="{{ old('telepon', $setting->telepon) }}">
                                    @error('telepon')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email" autocomplete="off"
                                        value="{{ old('email', $setting->email) }}">
                                    @error('email')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Logo Website<span class="text-danger">*</span></label><br>
                                    <img src="{{ url('storage/setting/' . $setting->gambar) }}"
                                        style="width: 234px; height:53px;">
                                </div>
                                <div class="form-group">
                                    <label>Ganti Logo<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        type="text" name="gambar">
                                    @error('gambar')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
