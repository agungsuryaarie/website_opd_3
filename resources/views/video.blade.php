@extends('layouts.app')
@section('content')
    <div class="section-content">
        <div class="container-f">
            <div class="row-image">
                @foreach ($video as $vid)
                    <div class="card-image">
                        <a href="{{ route('video.show', $vid->slug) }}">
                            <div class="hidden">
                                {{ preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $vid->url, $video_link) }}
                            </div>
                            {{-- Video old {{ preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $vid->link, $matches) }} --}}
                            <img src="https://img.youtube.com/vi/{{ $video_link[1] }}/0.jpg" class="img-responsive">
                            <h3>{{ $vid->judul }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
