@extends('layouts.app')

@section('content')
    <div class="section-content section-bg">
        <div class="container">
            <div class="row-news">
                <div class="card-details">
                    <div class="hidden">
                        {{ preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->url, $video_link) }}
                    </div>
                    <iframe src="https://www.youtube.com/embed/{{ $video_link[1] }}" allowfullscreen class="video-responsive"
                        title="Video Profil"></iframe>
                    <ul class="blog-info">
                    </ul>
                    <h3>{{ $video->judul }}</h3>
                    <p>{!! $video->deskripsi !!}</p>
                </div>
                <div class="section-left">
                    <div class="mb-20">
                        @foreach ($banner as $b)
                            <img src="{{ url('storage/banner', $b->gambar) }}" style="width: 100%" alt="">
                        @endforeach
                    </div>
                    <div class="recent-post">
                        <h4>Berita Terbaru</h4>
                        @foreach ($other_post as $ot)
                            <div class="blog-thumb blog-thumb-circle mb-10">
                                <div class="blog-thumb-hover">
                                    <img class="rounded-x" src="{{ url('storage/berita/' . $ot->foto) }}" alt="">
                                    <a class="hover-grad" href="blog_single.html"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="blog-thumb-desc">
                                    <h3><a href="{{ route('post.show', $ot->slug) }}">{{ $ot->judul }}</a></h3>
                                    <ul class="blog-thumb-info">
                                        <li><i class="bi bi-calendar"></i> {{ $ot->tanggal }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <section id="testimonials" class="testimonials section-bg">
        <div class="container-f" data-aos="fade-up">
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($other_video as $other)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="hidden">
                                    {{ preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $other->url, $video_link) }}
                                </div>
                                <img src="https://img.youtube.com/vi/{{ $video_link[1] }}/0.jpg" class="img-responsive">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section> --}}
@endsection
