@extends('front.layout.layout')
@section('title','Kafa Yapan Adam')

@section('icerik')
  <section class="banner-area banner-bg" data-background="frontas/img/black.jpg">
    <div class="container custom-container">
      <div class="row">
        <div class="col-xl-6 col-lg-8">
          <div class="banner-content">
            <h6 class="sub-title wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.8s">Kafa Yapan
              Adam</h6>
            <h2 class="title wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1.8s"> Sınırsız
              <span>Video</span>, TV Şovu ve Daha Fazlası.</h2>
            <a href="{{ route('frontHaberDetay',1) }}" class="banner-btn btn popup-video wow fadeInUp"
               data-wow-delay=".8s" data-wow-duration="1.8s"><i class="fas fa-play"></i> Şimdi İzle</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-area-end -->

  <!-- up-coming-movie-area -->
  <section class="ucm-area ucm-bg" data-background="frontas/img/bg/ucm_bg.jpg">
    <div class="ucm-bg-shape" data-background="frontas/img/bg/ucm_bg_shape.png"></div>
    <div class="container">
      <div class="row align-items-end mb-55">
        <div class="col-lg-6">
          <div class="section-title text-center text-lg-left">
            <h2 class="title">Yeni Yüklenenler</h2>
          </div>
        </div>

      </div>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tvShow" role="tabpanel" aria-labelledby="tvShow-tab">
          <div class="ucm-active owl-carousel">
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
        <div class="tab-pane fade" id="movies" role="tabpanel" aria-labelledby="movies-tab">
          <div class="ucm-active owl-carousel">
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
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
        <div class="tab-pane fade" id="anime" role="tabpanel" aria-labelledby="anime-tab">
          <div class="ucm-active owl-carousel">
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <a href="{{ route('frontHaberler') }}"><img src="frontas/img/sari.jpg" alt=""></a>
                <ul class="overlay-btn">
                  <li class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </li>
                  <li><a href="https://www.youtube.com/watch?v=9eqfyOIUEnI&ab_channel=DMAXTurkiye"
                         class="popup-video btn">Şimdi İzle</a></li>

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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <img src="frontas/img/sari.jpg" alt="">
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <img src="frontas/img/sari.jpg" alt="">
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <img src="frontas/img/sari.jpg" alt="">
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
            <div class="movie-item mb-50">
              <div class="movie-poster">
                <img src="frontas/img/sari.jpg" alt="">
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
      </div>
    </div>
  </section>
  <!-- up-coming-movie-area-end -->

  <!-- gallery-area -->
  <div class="gallery-area position-relative">
    <div class="gallery-bg"></div>
    <div class="container-fluid p-0 fix">
      <div class="row gallery-active">
        <div class="col-12">
          <div class="gallery-item">
            <img src="frontas/img/gallery2.png" alt="">
            <a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video"><img
                      src="frontas/img/play_icon.png" alt="" style=""></a>
          </div>
        </div>
        <div class="col-12">
          <div class="gallery-item">
            <img src="frontas/img/gallery2.png" alt="">
            <a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video"><img
                      src="frontas/img/play_icon.png" alt="" style=""></a>
          </div>
        </div>
        <div class="col-12">
          <div class="gallery-item">
            <img src="frontas/img/gallery2.png" alt="">
            <a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video"><img
                      src="frontas/img/play_icon.png" alt="" style=""></a>
          </div>
        </div>
        <div class="col-12">
          <div class="gallery-item">
            <img src="frontas/img/gallery2.png" alt="">
            <a href="https://www.dailymotion.com/embed/video/x8cf4fx" class="popup-video"><img
                      src="frontas/img/play_icon.png" alt="" style=""></a>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-nav"></div>
  </div>
  <!-- gallery-area-end -->

  <!-- top-rated-movie -->
  <section class="top-rated-movie tr-movie-bg" data-background="img/bg/tr_movies_bg.jpg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center mb-50">
            <span class="sub-title">Şimdiye Kadar</span>
            <h2 class="title">En Çok İzlenenler</h2>
          </div>
        </div>
      </div>
      <div class="row tr-movie-active">
        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
          <div class="movie-item mb-60">
            <div class="movie-poster">
              <a href="movie-details.html"><img src="frontas/img/sari.jpg" alt=""></a>
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
        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-three">
          <div class="movie-item mb-60">
            <div class="movie-poster">
              <a href="movie-details.html"><img src="frontas/img/sari.jpg" alt=""></a>
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
          <div class="movie-item mb-60">
            <div class="movie-poster">
              <a href="movie-details.html"><img src="frontas/img/sari.jpg" alt=""></a>
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
        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-three">
          <div class="movie-item mb-60">
            <div class="movie-poster">
              <a href="movie-details.html"><img src="frontas/img/sari.jpg" alt=""></a>
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
          <div class="movie-item mb-60">
            <div class="movie-poster">
              <a href="movie-details.html"><img src="frontas/img/sari.jpg" alt=""></a>
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
        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-three">
          <div class="movie-item mb-60">
            <div class="movie-poster">
              <a href="movie-details.html"><img src="frontas/img/sari.jpg" alt=""></a>
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
          <div class="movie-item mb-60">
            <div class="movie-poster">
              <a href="movie-details.html"><img src="frontas/img/sari.jpg" alt=""></a>
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
        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-three">
          <div class="movie-item mb-60">
            <div class="movie-poster">
              <a href="movie-details.html"><img src="frontas/img/sari.jpg" alt=""></a>
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
    </div>
  </section>
@endsection
