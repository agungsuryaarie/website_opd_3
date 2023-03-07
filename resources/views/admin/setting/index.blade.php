@extends('admin.layouts.app')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $menu }}</h1>
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
    @if ($setting != null)
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a href="{{ route('setting.edit', $setting->id) }}"
                                    class="btn btn-warning btn-xs text-white">
                                    <i class="fa fa-edit">
                                    </i></a>
                            </div>
                        </div>
                        <div class=" table-responsive">
                            <table class="table">
                                <tr>
                                    <td style="width:4%">
                                        Nama Instansi
                                    </td>
                                    <td style="width:0%">
                                        :
                                    </td>
                                    <td style="width:20%">
                                        {{ $setting->nama_instansi }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alamat
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $setting->alamat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Telepon
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $setting->telepon }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        email
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $setting->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        url
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $setting->url }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Logo Website
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <img class="profile-user-img img-fluid"
                                            src="{{ url('storage/setting/' . $setting->gambar) }}"
                                            alt="User profile picture">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a href="{{ route('setting.create') }}" class="btn btn-info btn-xs">
                                <i class="fa fa-plus-circle">
                                </i></a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h6>Opss, profil aplikasi belum diatur . . .</h6><br>
                        <img class="mb-5 mt-5" src="{{ url('dist/img/ils/set.png') }}" width="150px">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
