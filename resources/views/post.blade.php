@extends('layouts.app')

@section('content')
    <div class="section-content">
        <div class="section-tittle">
            <h3>{{ $title2 }}</h3>
        </div>
        <div class="container-card">
            <div class="row-card">
                @foreach ($post as $all)
                    <div class="cardpokersize">
                        <img src="{{ url('storage/berita/' . $all->foto) }}">
                        <ul class="blog-info">
                            <li><i class="bi bi-calendar"></i> {{ $all->tanggal }}</li>
                            <li><i class="bi bi-clock"></i> {{ $all->jam }} WIB</li>
                        </ul>
                        <h3><a href="{{ route('post.show', $all->slug) }}">{{ $all->judul }}</a></h3>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-center mb-30">
                {{ $post->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
