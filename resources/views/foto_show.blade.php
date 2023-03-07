@extends('layouts.app')

@section('content')
    <div class="section-content">
        <div class="container-f mb-30">
            <div class="text-center margin-bottom-50">
                <h2 class="title-v2 title-center">{{ $foto->judul }}</h2>
            </div>

            <div class="row  margin-bottom-30">
                @foreach ($detail as $d)
                    <div class="col-sm-3 sm-margin-bottom-30">
                        <a href="{{ url('storage/foto/' . $d->foto) }}" rel="gallery2" class="fancybox img-hover-v1"
                            title="Image 1">
                            <span>
                                <img class="img-responsive" src="{{ url('storage/foto/' . $d->foto) }}" alt="">
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        jquery(document).ready(function() {
            App.init();
            FancyBox.initFancybox();
            StyleSwitcher.initStyleSwitcher();
        });
    </script>
@endsection
