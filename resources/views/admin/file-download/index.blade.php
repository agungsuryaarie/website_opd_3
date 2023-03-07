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
                                        <th>Nama File</th>
                                        <th>Lampiran</th>
                                        <th>Tanggal File</th>
                                        <th>Tanggal Posting</th>
                                        <th class="text-center"style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($filedownload as $fd)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $fd->nama_file }}</td>
                                            <td>{{ $fd->lampiran }}</td>
                                            <td>{{ $fd->tanggalfile }}</td>
                                            <td>{{ $fd->tanggalpos }} </td>
                                            <td>
                                                <form
                                                    onsubmit="return confirm('Apakah Anda Yakin ingin Menghapus Data ini  ?');"
                                                    action="{{ route('file-download.destroy', $fd->id) }}" method="POST">
                                                    <a href="{{ route('file-download.update', $fd->id) }}"
                                                        class="btn btn-xs btn-primary"data-toggle="modal"
                                                        data-target="#edit{{ $fd->id }}"><i class="fas fa-edit"
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
                    <h4 class="modal-title">Tambah Lampiran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('file-download.store') }}"enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama File<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control @error('nama_file') is-invalid @enderror"
                                    name="nama_file" placeholder="Nama File" autocomplete="off"
                                    value="{{ old('nama_file') }}">
                                @error('nama_file')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>File<span class="text-danger"> *</span></label>
                                <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                                    type="text" name="lampiran" accept=".doc, .docx, .pptx, .pdf, .txt, .xlsx, .xls"
                                    value="{{ old('lampiran') }}">
                                @error('lampiran')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal File<span class="text-danger"> *</span></label>
                                <input type="date" class="form-control @error('tanggalfile') is-invalid @enderror"
                                    name="tanggalfile" value="{{ old('tanggalfile') }}">
                                @error('tanggalfile')
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
    @foreach ($filedownload as $fd)
        <div class="modal fade" id="edit{{ $fd->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Slideshow</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('file-download.update', $fd->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>nama<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="nama_file"
                                        placeholder="Nama File"autocomplete="off"
                                        value="{{ old('nama_file', $fd->nama_file) }}">
                                </div>
                                <div class="form-group">
                                    <label>File<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                                        type="text" name="lampiran"
                                        accept=".doc, .docx, .pptx, .pdf, .txt, .xlsx, .xls">
                                    @error('lampiran')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanggal File<span class="text-danger"> *</span></label>
                                    <input type="date" class="form-control" name="tanggalfile"
                                        value="{{ old('tanggalfile', $fd->tanggalfile) }}">
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
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
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
