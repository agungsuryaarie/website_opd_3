@extends('layouts.app')
@section('content')
    <div class="section-content">
        <div class="container-f">
            <div class="shadow-lg p-4">
                <div class="section-title">
                    <h4>Video</h4>
                </div>
                <div class="row-image">
                    @foreach ($video as $vid)
                        <div class="card-image">
                            <a href="{{ route('video.show', $vid->slug) }}">
                                <div class="hidden">
                                    {{ preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $vid->url, $video_link) }}
                                </div>
                                <img src="https://img.youtube.com/vi/{{ $video_link[1] }}/0.jpg" class="img-responsive">
                                <h3>{{ $vid->judul }}</h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
