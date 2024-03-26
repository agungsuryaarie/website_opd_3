@include('layouts.head')

<body>
    <header id="header" class="fixed-top ">
        <div class="container">
            <div class="px-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <a href="{{ route('home.index') }}">
                            <img src="{{ url('storage/setting/' . $setting->gambar) }}" alt="" class="img-fluid">
                        </a>
                    </div>
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @include('layouts.footer')

    @yield('script')
