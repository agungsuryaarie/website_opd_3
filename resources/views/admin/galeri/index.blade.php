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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" id="" class="btn btn-primary btn-sm float-right"data-toggle="modal"
                                data-target="#tambah">
                                <i class="fas fa-plus-circle"></i> Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">No</th>
                                        <th>Judul Album</th>
                                        <th>Cover Album</th>
                                        <th class="text-center"style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($galeri as $g)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $g->judul }}</td>
                                            <td><img src="{{ url('storage/galeri/' . $g->cover) }}" style="width:100px">
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('galeri.tambah_foto', $g->id) }}"
                                                    class="btn btn-xs btn-success"><i class="fas fa-image"
                                                        title="Foto"></i></a>
                                                <form
                                                    onsubmit="return confirm('Apakah Anda Yakin ingin Menghapus Data ini  ?');"
                                                    action="{{ route('galeri.destroy', $g->id) }}" method="POST">
                                                    <a href="{{ route('galeri.update', $g->id) }}"
                                                        class="btn btn-xs btn-primary"data-toggle="modal"
                                                        data-target="#edit{{ $g->id }}"><i class="fas fa-edit"
                                                            title="Edit"></i></a>
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


    {{-- Modal Tambah  --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Album</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('galeri.store') }}"enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label>Judul Album<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                placeholder="Judul" autocomplete="off" value="{{ old('judul') }}">
                            @error('judul')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Cover<span class="text-danger"> *</span></label>
                            <input type="file" class="form-control @error('cover') is-invalid @enderror" type="text"
                                name="cover" accept=".jpg, .jpeg, .png">
                            @error('cover')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    @foreach ($galeri as $g)
        <div class="modal fade" id="edit{{ $g->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Album</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('galeri.update', $g->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul Album<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" placeholder="Judul" autocomplete="off"
                                        value="{{ old('judul', $g->judul) }}">
                                    @error('judul')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Cover<span class="text-danger">*</span></label><br>
                                    <img src="{{ url('storage/galeri/' . $g->cover) }}" style="width: 50%">
                                </div>
                                <div class="form-group">
                                    <label>Cover<span class="text-danger"> *</span></label>
                                    <input type="file" class="form-control @error('cover') is-invalid @enderror"
                                        type="text" name="cover" accept=".jpg, .jpeg, .png">
                                    @error('cover')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer justify-content-end">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
