@extends('front.layout.layout')
@section('title','Kafa Yapan Adam')

@section('icerik')
    <section class="breadcrumb-area breadcrumb-bg" data-background="frontas/img/black.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Tüm <span>Videolar</span></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontIndex') }}">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('frontHaberler') }}">Videolar</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="movie-area movie-bg" data-background="frontas/img/bg/movie_bg.jpg">
        <div class="container">
            <div class="row align-items-end mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center text-lg-left">
                        <h2 class="title">Tüm Videolar</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
            <div class="row tr-movie-active">
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="frontas/img/sari.jpg" alt="">
                            <ul class="overlay-btn">
                                <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><a href="https://www.dailymotion.com/embed/video/x8cf4fx" target="_blank" class="popup-video btn">Şimdi İzle</a></li>
                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="movie-details.html">Video Başlığı</a></h5>
                                <span class="date">2021</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> 128 dk</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="img/sari.jpg" alt="">
                            <ul class="overlay-btn">
                                <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video btn">Şimdi İzle</a></li>

                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="movie-details.html">Video Başlığı</a></h5>
                                <span class="date">2021</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> 128 dk</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="img/sari.jpg" alt="">
                            <ul class="overlay-btn">
                                <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video btn">Şimdi İzle</a></li>

                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="movie-details.html">Video Başlığı</a></h5>
                                <span class="date">2021</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> 128 dk</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="img/sari.jpg" alt="">
                            <ul class="overlay-btn">
                                <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video btn">Şimdi İzle</a></li>

                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="movie-details.html">Video Başlığı</a></h5>
                                <span class="date">2021</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> 128 dk</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="img/sari.jpg" alt="">
                            <ul class="overlay-btn">
                                <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video btn">Şimdi İzle</a></li>

                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="movie-details.html">Video Başlığı</a></h5>
                                <span class="date">2021</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> 128 dk</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="img/sari.jpg" alt="">
                            <ul class="overlay-btn">
                                <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video btn">Şimdi İzle</a></li>

                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="movie-details.html">Video Başlığı</a></h5>
                                <span class="date">2021</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> 128 dk</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="img/sari.jpg" alt="">
                            <ul class="overlay-btn">
                                <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video btn">Şimdi İzle</a></li>

                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="movie-details.html">Video Başlığı</a></h5>
                                <span class="date">2021</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> 128 dk</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="img/sari.jpg" alt="">
                            <ul class="overlay-btn">
                                <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video btn">Şimdi İzle</a></li>

                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="movie-details.html">Video Başlığı</a></h5>
                                <span class="date">2021</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> 128 dk</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="pagination-wrap mt-30">
                        <nav>
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
