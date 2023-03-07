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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <h5> Tambah Foto Galeri</h5>
                            </div>
                        </div>
                        <form action="{{ route('foto.store', $galery->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <p>Judul Album Galeri :<b> {{ $galery->judul }}</b></p>
                                <div class="form-group">
                                    <label for="">Cover Album :</label><br>
                                    <img src="{{ url('storage/galeri/' . $galery->cover) }}" style="width: 70%;">
                                </div>
                                <div class="form-group">
                                    <label>Tambah Foto :</label>
                                    <input type="file" class="form-control  @error('foto') is-invalid @enderror"
                                        type="text" name="foto" accept=".jpg, .jpeg, .png">
                                    @error('foto')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('galeri.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <h5> Daftar Foto</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">No</th>
                                        <th>Foto</th>
                                        <th class="text-center"style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($foto as $f)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td><img src="{{ url('storage/foto/' . $f->foto) }}" style="width:100px"></td>
                                            <td class="text-center">
                                                <form
                                                    onsubmit="return confirm('Apakah Anda Yakin ingin Menghapus Data ini  ?');"
                                                    action="{{ route('foto.destroy', ['galeri_id' => $f->galeri_id, 'id' => $f->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger"><i
                                                            class="fas fa-trash" title="Hapus"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
