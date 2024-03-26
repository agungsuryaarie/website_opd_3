@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-6">
            <div class="slideshow">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($slideshow as $s)
                            <div class="carousel-item active">
                                <img src="{{ url('storage/slideshow/' . $s->gambar) }}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <main id="main">
        <div class="container pt-24">
            <div class="row d-flex justify-content-between px-6">
                <div class="col-md-8">
                    <div class="section-tittle mb-10">
                        <div class="d-flex bd-highlight">
                            <h2 class="flex-grow-1 bd-highlight">Berita Dinas</h2>
                            <div class="bd-highlight" id="event-more">
                                <div class="view-more">
                                    <a href="{{ route('post.dinas') }}"
                                        class="d-flex align-items-center jss-cinfo text-hover-primary">Lihat semua
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($post_dinas as $post)
                            <div class="col-sm-7 mb-5">
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

                <div class="col-md-4">
                    <div class="widget" id="gpr">
                        <div id="gpr-kominfo-widget-container"></div>
                    </div>
                </div>
            </div>
        </div>


        <section class="bg-body-tertiary pt-24">
            <div class="container">
                <div class="section-tittle mb-3 px-6">
                    <div class="d-flex bd-highlight align-items-center">
                        <h2 class="flex-grow-1 bd-highlight">Berita Pemerintahan</h2>
                        <div class="bd-highlight" id="event-more">
                            <div class="view-more">
                                <a href="{{ route('post.pemerintahan') }}"
                                    class="d-flex align-items-center jss-cinfo text-hover-primary">Lihat semua
                                    <i
                                        class="fad fa-chevron-double-right d-none d-md-block d-lg-block py-1 px-1 jss-cinfo"></i>>></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-stretch retro-layout px-6">
                    @foreach ($post_pemerintahan as $post)
                        <div class="col-md-6">
                            <a href="" class="h-entry mb-30 b-height gradient">
                                <div class="featured-img"
                                    style="background-image: url('{{ url('storage/berita', $post->foto) }}');">
                                </div>
                                <div class="text">
                                    <span class="date">{{ $post->tanggal }}</span>
                                    <h2>{{ $post->judul }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    <div class="col-md-3">
                        @foreach ($post_pemerintahan2 as $post)
                            <a href="" class="h-entry mb-30 v-height gradient">
                                <div class="featured-img"
                                    style="background-image: url('{{ url('storage/berita', $post->foto) }}');">
                                </div>
                                <div class="text">
                                    <span class="date">{{ $post->tanggal }}</span>
                                    <h2>{{ $post->judul }}</h2>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        @foreach ($post_pemerintahan3 as $post)
                            <a href="" class="h-entry mb-30 v-height gradient">
                                <div class="featured-img"
                                    style="background-image: url('{{ url('storage/berita', $post->foto) }}');">
                                </div>
                                <div class="text">
                                    <span class="date">{{ $post->tanggal }}</span>
                                    <h2>{{ $post->judul }}</h2>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="pt-24">
            <div class="container">
                <div class="section-tittle mb-3">
                    <div class="d-flex bd-highlight px-6">
                        <h2 class="flex-grow-1 bd-highlight">Berita Umum</h2>
                    </div>
                </div>
                <div class="relative px-6">
                    <div class="swiper Terkini ">
                        <div class="swiper-wrapper">
                            @foreach ($post_umum as $u)
                                <div class="swiper-slide">
                                    <div class="mx-auto">
                                        <div class="card">
                                            <img src="{{ url('storage/berita/' . $u->foto) }}" class="card-img-post"
                                                alt="Gambar">
                                            <div class="card-img-overlay d-flex flex-column justify-end">
                                                <p class="card-text text-white">{{ $u->judul }}</p>
                                                <ul class="blog-info">
                                                    <li><i class="bi bi-calendar"></i> 2023-06-05</li>
                                                    <li><i class="bi bi-clock"></i> 06:02:53 WIB</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div
                        class="swipper-nav absolute top-5 right-0 flex items-center justify-center space-x-2 pr-6 mt-[1.2rem] mb-3 z-50">
                        <button class="swiper-button-prevv">
                            <i class='bx bx-chevron-left'></i>
                        </button>
                        <button class="swiper-button-nextt">
                            <i class='bx bx-chevron-right'></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials pt-24 mb-5">
            <div class="container" data-aos="fade-up">
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

@section('script')
    <script>
        var swiper = new Swiper(".Terkini", {
            spaceBetween: 25,
            slidesPerView: 4,
            // loop: true,
            pagination: {
                el: '.swiper-pagination',
            },
            autoplay: {
                delay: 3000, // Atur jeda antara slide (dalam milidetik)
                disableOnInteraction: false, // Biarkan autoplay berlanjut setelah interaksi pengguna
            },
            navigation: {
                nextEl: ".swiper-button-nextt",
                prevEl: ".swiper-button-prevv",
            }
        });
    </script>
@endsection
