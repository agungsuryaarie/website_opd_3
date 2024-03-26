@extends('layouts.app')

@section('content')
    <div class="portfolio section-content">
        <div class="container" data-aos="fade-up">
            <div class="px-6">
                <div class="shadow-lg p-4">
                    <div class="section-title">
                        <h4>{{ $foto->judul }} </h4>
                    </div>
                    <div class="row portfolio-container">
                        @foreach ($detail as $d)
                            <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                    <img src="{{ url('storage/foto/' . $d->foto) }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                    </div>
                                    <div class="portfolio-links">
                                        <a href="{{ url('storage/foto/' . $d->foto) }}" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox" title=""><i class="bx bx-zoom-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
