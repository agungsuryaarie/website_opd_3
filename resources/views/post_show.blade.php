@extends('layouts.app')

@section('content')
    <div class="section-content section-bg">
        <div class="container">
            <div class="row-news">
                <div class="card-details">
                    <img src="{{ url('storage/berita/' . $post->foto) }}">
                    <ul class="blog-info">
                        <li><i class="bi bi-calendar"></i> {{ $post->tanggal }}</li>
                        <li><i class="bi bi-clock"></i> {{ $post->jam }} WIB</li>
                    </ul>
                    <h3>{{ $post->judul }}</h3>
                    <p>{!! $post->isi !!}</p>
                </div>



                <div class="section-left">
                    <div class="mb-20">
                        @foreach ($banner as $b)
                            <img src="{{ url('storage/banner', $b->gambar) }}" style="width: 100%" alt="">
                        @endforeach
                    </div>
                    <div class="recent-post">
                        <h4 class="mb-20">Berita Lainnya</h4>
                        @foreach ($recent_post as $rpost)
                            <div class="blog-thumb blog-thumb-circle mb-10">
                                <div class="blog-thumb-hover">
                                    <img class="rounded-x" src="{{ url('storage/berita/' . $rpost->foto) }}" alt="">
                                    <a class="hover-grad" href="blog_single.html"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="blog-thumb-desc">
                                    <h3><a href="{{ route('post.show', $rpost->slug) }}">{{ $rpost->judul }}</a></h3>
                                    <ul class="blog-thumb-info">
                                        <li><i class="bi bi-calendar"></i> {{ $rpost->tanggal }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
