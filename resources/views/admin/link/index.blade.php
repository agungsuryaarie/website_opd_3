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
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">No</th>
                                        <th>Nama</th>
                                        <th>Link URL</th>
                                        <th>Gambar</th>
                                        <th class="text-center"style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($link as $l)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $l->nama }}</td>
                                            <td>{{ $l->link_url }}</td>
                                            <td><img src="{{ url('storage/link/' . $l->gambar) }}" style="width:100px"></td>
                                            <td>
                                                <form
                                                    onsubmit="return confirm('Apakah Anda Yakin ingin Menghapus Data ini  ?');"
                                                    action="{{ route('link.destroy', $l->id) }}" method="POST">
                                                    <a href="{{ route('link.update', $l->id) }}"
                                                        class="btn btn-xs btn-primary"data-toggle="modal"
                                                        data-target="#edit{{ $l->id }}"><i class="fas fa-edit"
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
                    <h4 class="modal-title">Tambah Link</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('link.store') }}"enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="nama" autocomplete="off" value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Link URL<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control @error('link_url') is-invalid @enderror"
                                    name="link_url" placeholder="link URL" autocomplete="off"
                                    value="{{ old('link_url') }}">
                                @error('link_url')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar<span class="text-danger"> *</span></label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    type="text" name="gambar" accept=".jpg, .jpeg, .png">
                                @error('gambar')
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

    {{-- Modal Edit  --}}
    @foreach ($link as $l)
        <div class="modal fade" id="edit{{ $l->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Link</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('link.update', $l->id) }}"enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" placeholder="nama" autocomplete="off"
                                        value="{{ old('nama', $l->nama) }}">
                                    @error('nama')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Link URL<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control @error('link_url') is-invalid @enderror"
                                        name="link_url" placeholder="link URL" autocomplete="off"
                                        value="{{ old('link_url', $l->link_url) }}">
                                    @error('link_url')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar<span class="text-danger">*</span></label><br>
                                    <img src="{{ url('storage/link/' . $l->gambar) }}" style="width: 50%;">
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
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')
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
