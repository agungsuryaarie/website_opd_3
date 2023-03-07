@extends('layouts.app')

@section('content')
    <div class="section-content">
        <div class="container-f">
            <div class="row-image">
                @foreach ($foto as $img)
                    <div class="card-image">
                        <img src="{{ url('storage/galeri/' . $img->cover) }}">
                        <a href="{{ route('media.show', $img->id) }}">
                            <h3>{{ $img->judul }} </h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
