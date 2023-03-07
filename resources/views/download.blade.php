@extends('layouts.app')

@section('content')
    <div class="section-content">
        <div class="container mb-30">
            <div class="row-download">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 3%">No</th>
                                        <th>Nama File</th>
                                        <th>Upload</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($download as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->nama_file }} </td>
                                            <td>{{ $d->tanggalfile }} </td>
                                            <td class="text-center"><a href="{{ url('storage/lampiran', $d->lampiran) }}"
                                                    target="_blank" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-cloud-arrow-down-fill"></i> Download</a>
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
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
