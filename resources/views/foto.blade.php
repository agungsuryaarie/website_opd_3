@extends('layouts.app')

@section('content')
    <section class="section--collections flex-section">
        <div class="flex-section--content">
            <div class="flex-title">
                <div>
                    <h2 class="title">
                        Galeri Foto</h2>
                </div>
            </div>
            <ul class="flex-section--carousel caption-list--double">
                @foreach ($foto as $img)
                    <div class="mb-6">
                        <li>
                            <a class="caption-list--item" href="{{ route('media.show', $img->id) }}">
                                <img class="caption-list--background" src="{{ url('storage/galeri/' . $img->cover) }}"
                                    title="" loading="lazy">
                                <div class="caption-list--wrapper">
                                    <img class="caption-list--image" src="{{ url('storage/galeri/' . $img->cover) }}"
                                        title="" loading="lazy">
                                    <p class="caption-list--title overflow-lines">{{ $img->judul }} </p>
                                    {{-- <p class="caption-list--subtitle"><i class="bi bi-image-fill"></i>
                                        115 Foto </p> --}}
                                </div>
                            </a>
                        </li>
                    </div>
                @endforeach
                {{-- <li>
                    <a class="caption-list--item" href="/collections">
                        <button class="caption-list--wrapper caption-list--more button--arrow button--arrow-right">
                            <span>Explore <i class="icon icon--lg icon--right-small"></i></span>
                        </button>
                    </a>
                </li> --}}
            </ul>
        </div>
    </section>
    <div class="portfolio section-content">
        <div class="container-f">
            <div class="shadow-lg p-4">
                <div class="section-title">
                    <h4>Galeri Foto</h4>
                </div>
                <div class="row-image">
                    @foreach ($foto as $img)
                        <div class="card-image">
                            <a href="{{ route('media.show', $img->id) }}">
                                <img src="{{ url('storage/galeri/' . $img->cover) }}">
                                <h3>{{ $img->judul }} </h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
