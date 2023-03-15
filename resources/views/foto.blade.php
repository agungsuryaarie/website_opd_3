@extends('layouts.app')

@section('content')
    <section id="portfolio" class="portfolio section-content">
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
    </section>
@endsection
