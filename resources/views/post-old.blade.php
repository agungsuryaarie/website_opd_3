@extends('layouts.app')

@section('content')
    <section class="berita">
        <div class="container">
            <div class="row-news">
                <div class="col-lg-7">
                    <div class="item box-shadow">
                        <div class="row">
                            @foreach ($post as $all)
                                <div class="col-sm-5 image mb-30">
                                    <img src="{{ url('front/img/2.jpeg') }}" alt="">
                                </div>
                                <div class="col-sm-7">
                                    <div class="blog-grid">
                                        <h3><a href="{{ route('post.show', $all->slug) }}">{{ $all->judul }}</a></h3>
                                        <ul class="blog-grid-info">
                                            <li>Evan Bartlett</li>
                                            <li>Mar 6, 2015</li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 0</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            {{ $post->links() }}
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav> --}}
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    <div class="box-shadow">
                        <div class="margin-bottom-50">
                            <h4> Recent News</h4>

                            <div class="blog-thumb blog-thumb-circle mb-10">
                                <div class="blog-thumb-hover">
                                    <img class="rounded-x" src="{{ url('front/img/2.jpeg') }}" alt="">
                                    <a class="hover-grad" href="blog_single.html"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="blog-thumb-desc">
                                    <h3><a href="blog_single.html">Misused words and how to use them correctly</a></h3>
                                    <ul class="blog-thumb-info">
                                        <li>Mar 6, 2015</li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 0</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="blog-thumb blog-thumb-circle mb-10">
                                <div class="blog-thumb-hover">
                                    <img class="rounded-x" src="assets/img/blog/img22.jpg" alt="">
                                    <a class="hover-grad" href="blog_single.html"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="blog-thumb-desc">
                                    <h3><a href="blog_single.html">8 health benefits and drawbacks of coffee</a></h3>
                                    <ul class="blog-thumb-info">
                                        <li>Mar 6, 2015</li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 0</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="blog-thumb blog-thumb-circle mb-10">
                                <div class="blog-thumb-hover">
                                    <img class="rounded-x" src="assets/img/blog/img2.jpg" alt="">
                                    <a class="hover-grad" href="blog_single.html"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="blog-thumb-desc">
                                    <h3><a href="blog_single.html">What are the top five books you must read?</a></h3>
                                    <ul class="blog-thumb-info">
                                        <li>Mar 6, 2015</li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 0</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="blog-thumb blog-thumb-circle">
                                <div class="blog-thumb-hover">
                                    <img class="rounded-x" src="assets/img/blog/img21.jpg" alt="">
                                    <a class="hover-grad" href="blog_single.html"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="blog-thumb-desc">
                                    <h3><a href="blog_single.html">Stylish things to do, see and buy this week</a></h3>
                                    <ul class="blog-thumb-info">
                                        <li>Mar 6, 2015</li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 0</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
