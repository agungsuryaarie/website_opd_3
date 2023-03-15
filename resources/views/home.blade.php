@extends('layouts.app')

@section('content')
    <div class="slideshow">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slideshow as $s)
                    <div class="carousel-item active">
                        <img src="{{ url('storage/slideshow/' . $s->gambar) }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <main id="main">
        <section id="news" class="news section-bg">
            <div class="container">
                <div class="row-blog">
                    <div class="col-md-7">
                        <div class="section-tittle">
                            <div class="d-flex bd-highlight">
                                <h2 class="flex-grow-1 bd-highlight">Berita Dinas</h2>
                                <div class="bd-highlight" id="event-more">
                                    <div class="view-more">
                                        <a href="{{ route('post.dinas') }}"
                                            class="d-flex align-items-center jss-cinfo text-hover-primary mb-10">Lihat semua
                                            <i
                                                class="fad fa-chevron-double-right d-none d-md-block d-lg-block py-1 px-1 jss-cinfo"></i>>></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-30">
                            @foreach ($post_dinas as $post)
                                <div class="col-sm-7">
                                    <div class="blog-grid sm-margin-bottom-40">
                                        <div class="blog-grid-grad">
                                            <img src="{{ url('storage/berita', $post->foto) }}" alt="">
                                        </div>
                                        <h3><a href="{{ route('post.show', $post->slug) }}">{{ $post->judul }}</a>
                                        </h3>
                                        <ul class="blog-grid-info">
                                            <li><i class="bi bi-calendar"></i> {{ $post->tanggal }}</li>
                                            <li><i class="bi bi-clock"></i> {{ $post->jam }} WIB</li>
                                        </ul>
                                        {{-- <p> {!! Str::limit($post->isi, 150) !!}</p> --}}
                                    </div>
                                </div>
                            @endforeach


                            <div class="col-sm-5">
                                @foreach ($post_latest as $post)
                                    <div class="blog-thumb-v2">
                                        <div class="blog-thumb-grad">
                                            <img src="{{ url('storage/berita', $post->foto) }}" alt="">
                                        </div>
                                        <div class="blog-thumb-desc">
                                            <h3><a href="{{ route('post.show', $post->slug) }}">{{ $post->judul }}</a>
                                            </h3>
                                            <ul class="blog-thumb-info">
                                                <li><i class="bi bi-calendar"></i> {{ $post->tanggal }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @foreach ($banner as $b)
                        <div class="col-md-3">
                            <div class="blog-grid-grad">
                                <img src="{{ url('storage/banner', $b->gambar) }}" style="width: 100%" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="features" class="services section-bg">
            <div class="container-f">
                <div class="section-tittle">
                    <div class="d-flex bd-highlight">
                        <h2 class="flex-grow-1 bd-highlight">Berita Pemerintahan</h2>
                        <div class="bd-highlight" id="event-more">
                            <div class="view-more">
                                <a href="{{ route('post.pemerintahan') }}"
                                    class="d-flex align-items-center jss-cinfo text-hover-primary mb-10">Lihat semua
                                    <i
                                        class="fad fa-chevron-double-right d-none d-md-block d-lg-block py-1 px-1 jss-cinfo"></i>>></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-card">
                @foreach ($post_pemerintahan as $post)
                    <div class="cardpokersize">
                        <img src="{{ url('storage/berita/' . $post->foto) }}">
                        <ul class="blog-info">
                            <li><i class="bi bi-calendar"></i> {{ $post->tanggal }}</li>
                            <li><i class="bi bi-clock"></i> {{ $post->jam }} WIB</li>
                        </ul>
                        <h3><a href="{{ route('post.show', $post->slug) }}">{{ $post->judul }}</a></h3>
                    </div>
                @endforeach
            </div>
        </section>


        <section id="testimonials" class="testimonials section-bg">
            <div class="container-f" data-aos="fade-up">
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($link as $l)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="{{ url('storage/link/' . $l->gambar) }}" class="testimonial-img"
                                        alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    </main>
@endsection
