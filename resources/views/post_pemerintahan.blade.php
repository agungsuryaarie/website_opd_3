@extends('layouts.app')

@section('content')
    <div class="section-content section-bg">
        <div class="section-tittle">
            <h3>{{ $title2 }}</h3>
        </div>
        <div class="container-card">
            <div class="row-card">
                @foreach ($post_pemerintahan as $pp)
                    <div class="cardpokersize">
                        <img src="{{ url('storage/berita/' . $pp->foto) }}">
                        <ul class="blog-info">
                            <li><i class="bi bi-calendar"></i> {{ $pp->tanggal }}</li>
                            <li><i class="bi bi-clock"></i> {{ $pp->jam }} WIB</li>
                        </ul>
                        <h3><a href="{{ route('post.show', $pp->slug) }}">{{ $pp->judul }}</a></h3>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-center mb-30">
                {{ $post_pemerintahan->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
