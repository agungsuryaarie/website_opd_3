@extends('layouts.app')

@section('content')
    <div class="section-content section-bg">
        <div class="section-tittle">
            <h3>{{ $title2 }}</h3>
        </div>
        <div class="container-card">
            <div class="row-card">
                @foreach ($post_dinas as $pd)
                    <div class="cardpokersize">
                        <img src="{{ url('storage/berita/' . $pd->foto) }}">
                        <ul class="blog-info">
                            <li><i class="bi bi-calendar"></i> {{ $pd->tanggal }}</li>
                            <li><i class="bi bi-clock"></i> {{ $pd->jam }} WIB</li>
                        </ul>
                        <h3><a href="{{ route('post.show', $pd->slug) }}">{{ $pd->judul }}</a></h3>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-center mb-30">
                {{ $post_dinas->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
