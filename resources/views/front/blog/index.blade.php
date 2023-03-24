@extends('front.layout.layout')
@section('title','Kafa Yapan Adam')

@section('icerik')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="frontas/img/black.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontIndex') }}">Ana Sayfa</a></li>

                                <li><a href="{{ route('frontBlogList') }}">Blog</a></li></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-area -->
    <section class="blog-area blog-bg" data-background="frontas/img/bg/blog_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($data as $datum)
                        <div class="blog-post-item">
                            <div class="blog-post-thumb">
                                <a href="{{ route('frontBlogDetail',$datum->id) }}"><img src="{{ $datum->image }}" alt=""></a>
                            </div>
                            <div class="blog-post-content">

                                <h2 class="title"><a href="{{ route('frontBlogDetail',$datum->id) }}">{{ $datum->baslik }}
                                </h2>
                                {{ $datum->kisaaciklama }}
                                <div class="blog-post-meta">

                                    <div class="read-more">
                                        <a href="{{ route('frontBlogDetail',$datum->id) }}">Daha Fazla<i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination-wrap mt-60">
                        <nav>
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">Sonraki</a></li>
                            </ul>
                        </nav>
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
                                                <a href="{{ route('frontBlogDetail',$datum->id) }}"><img src="{{ $datum->image }}" width="100px" alt=""></a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="{{ route('frontBlogDetail',$datum->id) }}">{{ $datum->baslik }} </a></h5>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                        <div class="widget blog-widget">
                            <div class="widget-title mb-30">
                                <h5 class="title">Beni Takip Edin</h5>
                            </div>
                            <div class="contact-info-wrap">
                                <div class="contact-info-list">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"> <span style="margin-left: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">Kafayapanadam</span> </i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"> <span style="margin-left: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">Kafayapanadam</span></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"> <span style="margin-left: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">Kafayapanadam</span></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"> <span style="margin-left: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">Kafayapanadam</span></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->

@endsection
