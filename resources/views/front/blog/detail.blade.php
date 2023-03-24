@extends('front.layout.layout')
@section('title','Kafa Yapan Adam')

@section('icerik')
    <section class="blog-details-area blog-bg" data-background="{{ asset('frontas/img/bg/blog_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-post-item blog-details-wrap">
                        <div class="blog-post-thumb">
                            <a href="{{ route('frontBlogDetail',$blog->id) }}"><img src="{{ asset($blog->image) }}" alt=""></a>
                        </div>
                        <div class="blog-post-content">
                            <h2 class="title">{{ $blog->title }}</h2>
                            {!! $blog->icerik !!}
                        </div>
                    </div>
                    <div class="blog-comment mb-80">

                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="blog-sidebar">
                        <div class="widget blog-widget">
                            <div class="widget-title mb-30">
                                <h5 class="title">Ara</h5>
                            </div>
                            <form action="#" class="sidebar-search">
                                <input type="text" placeholder="Ara...">
                                <button><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget blog-widget">
                            <div class="widget-title mb-30">
                                <h5 class="title">Blog Yazıları</h5>
                            </div>
                            <div class="rc-post">
                                <ul>
                                    @foreach($data as $datum)
                                        <li class="rc-post-item">
                                            <div class="thumb">
                                                <a href="{{ route('frontBlogDetail',$datum->id) }}"><img src="{{ asset($datum->image) }}" width="100px" alt=""></a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="{{ route('frontBlogDetail',$datum->id) }}">{{ $datum->kisaaciklama }}</a></h5>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection
