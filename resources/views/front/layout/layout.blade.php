<!DOCTYPE html>
<html class="no-js" lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kafa Yapan Adam</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontas/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontas/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontas/css/responsive.css') }}">
    <title>@yield('title')</title>
</head>
<body>

<!-- preloader -->
<div id="preloader">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <img src="{{ asset('frontas/img/preloader.svg') }}" alt="">
        </div>
    </div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
<header>
    <div id="sticky-header" class="menu-area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav show">
                            <div class="logo">
                                <a href="{{ route('frontIndex') }}">
                                    <img src="{{ asset('frontas/img/logo/logo.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="menu-item-has-children"><a href="{{ route('frontIndex') }}">{{ __('front.anasayfa') }}</a></li>

                                    <li class="menu-item-has-children"><a href="{{ route('frontHaberler') }}">{{ __('front.kitaplik') }}</a>

                                    </li>
                                    <li><a href="{{ route('aboutUs') }}">{{ __('front.hakkimizda') }}</a></li>
                                    <li class="menu-item-has-children"><a href="{{ route('frontBlogList') }}">{{ __('front.blog') }}</a></li>
                                    <li><a href="{{ route('frontContact') }}">{{ __('front.iletisim') }}</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul>
                                    <li class="header-search"><a href="#" data-toggle="modal"
                                                                 data-target="#search-modal"><i class="fas fa-search"></i></a></li>
                                    <li class="header-lang">
                                        <form action="#">
                                            <div class="icon"><i class="flaticon-globe"></i></div>
                                            <select onchange="changeLang()" id="lang-dropdown" name="lang">
                                                <option value="tr" {{ \Illuminate\Support\Facades\Session::get('dil') == "tr" ? "selected" : "" }}>TR</option>
                                                <option value="en" {{ \Illuminate\Support\Facades\Session::get('dil') == "en" ? "selected" : "" }}>EN</option>
                                                <option value="de">DE</option>
                                            </select>
                                        </form>
                                    </li>
                                    @if(\Illuminate\Support\Facades\Session::has('frontGirisDurum'))
                                        <li class="header-btn"><a href="{{ route('frontLogout') }}" class="btn">Çıkış Yap</a> </li>
                                    @else
                                        <li class="header-btn"><a href="{{ route('frontLogin') }}" class="btn">{{ __('front.girisyap') }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <div class="close-btn"><i class="fas fa-times"></i></div>

                        <nav class="menu-box">
                            <div class="nav-logo"><a href="{{ route('frontIndex') }}"><img src="{{ asset('frontas/img/logo/logo.png') }}" alt=""
                                                                                           title=""></a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->

                    <!-- Modal Search -->
                    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form>
                                    <input type="text" placeholder="Ara...">
                                    <button><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Search-end -->

                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->
<main>

    @yield('icerik')
</main>

<footer>
    <div class="footer-top-wrap">
        <div class="container">
            <div class="footer-menu-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <a href="{{ route('frontIndex') }}"><img src="{{ asset('frontas/img/logo/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="footer-menu">
                            <nav>
                                <ul class="navigation">
                                    <li><a href="{{ route('frontIndex') }}">{{ __('front.anasayfa') }}</a></li>
                                    <li><a href="{{ route('frontHaberler') }}">{{ __('front.kitaplik') }}</a></li>
                                    <li><a href="{{ route('aboutUs') }}">{{ __('front.hakkimizda') }}</a></li>
                                    <li><a href="{{ route('frontBlogList') }}">{{ __('front.blog') }}</a></li>
                                    <li><a href="{{ route('frontContact') }}">{{ __('front.iletisim') }}</a></li>
                                </ul>
                                <div class="footer-search">
                                    <form action="#">
                                        <input type="text" placeholder="Ara...">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-quick-link-wrap">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="quick-link-list">
                            <ul>
                                <li><a href="{{ route('frontCookiesPolicy') }}">Çerez Bildirimi</a></li>
                                <li><a href="{{ route('frontPrivacyPolicy') }}">{{ __('front.gizliliksozlesmesi') }}</a></li>
                                <li><a href="{{ route('frontgizliliksozlesmesiPage') }}">Kullanım Koşulları</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-text">
                        <p> &copy; 2021. Tüm Hakları Saklıdır. | <a href="{{ route('frontIndex') }}">Kafa Yapan Adam</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->





<!-- JS here -->
<script src="{{ asset('frontas/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontas/js/popper.min.js') }}"></script>
<script src="{{ asset('frontas/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontas/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontas/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontas/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontas/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontas/js/jquery.odometer.min.js') }}"></script>
<script src="{{ asset('frontas/js/jquery.appear.js') }}"></script>
<script src="{{ asset('frontas/js/slick.min.js') }}"></script>
<script src="{{ asset('frontas/js/ajax-form.js') }}"></script>
<script src="{{ asset('frontas/js/wow.min.js') }}"></script>
<script src="{{ asset('frontas/js/aos.js') }}"></script>
<script src="{{ asset('frontas/js/plugins.js') }}"></script>
<script src="{{ asset('frontas/js/main.js') }}"></script>
<script>
    function changeLang() {
        var selectedLang = $('#lang-dropdown').val();
        $.ajax({
            type: "GET",
            method: "GET",
            url: "dildegis/" + selectedLang,
            success: function (response) {
                if(response.status)
                {
                    window.location.reload();
                }
            }
        });

    }
</script>
</body>
</html>