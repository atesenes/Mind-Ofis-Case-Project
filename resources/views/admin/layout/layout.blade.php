<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        @if(\App\Models\siteSettings::where('id','=',1)->count()==1) {{\App\Models\siteSettings::where('id','=',1)->first()->sitebaslik }} Admin Panel @else Admin Panel @endif
    </title>
    <!-- CSS files -->
    <link href="{{ asset('adminas/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminas/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminas/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminas/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminas/css/demo.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('adminas/css/customstyle.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
    <!-- Datatables CDN -->
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<body>
<div class="wrapper">
    <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="{{route('adminIndex')}}">
                    <img style="background: black;padding:0 10px" src="{{asset('adminas/images/logo.png')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image" />
                </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <div style="margin-right: 20px" class="nav-item">
                    <a target="_blank" href="/"><button class="btn btn-sm btn-success">Site Önizleme</button></a>
                </div>
                <a style="margin-right: 20px" href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a style="margin-right: 20px" href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="4" />
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('adminas/images/000m.jpg')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>
                                @if(\Illuminate\Support\Facades\Session::get('userEmail'))
                                    @php
                                        $user=\App\Models\user::where('email','=',\Illuminate\Support\Facades\Session::get('userEmail'))->first();
                                    @endphp
                                    {{$user->firstname}} {{$user->lastname}}
                                @endif
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{route('adminUserEdit',['id'=>$user->id])}}" class="dropdown-item">@lang('admin.ayarlar')</a>
                        <a href="{{route('logout')}}" class="dropdown-item">@lang('admin.cikis')</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="container-xl">
                    <!-- ÜST MENÜ BAŞLANGIÇ -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminIndex')}}">
                                <i class="bi bi-house-fill" id="headericon"></i>
                                <span class="nav-link-title">Anasayfa</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminKurumsalList')}}">
                                <i class="bi bi-building" id="headericon"></i>
                                <span class="nav-link-title">Kurumsal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminPagesList')}}">
                                <i class="bi bi-window-stack" id="headericon"></i>
                                <span class="nav-link-title">Sayfalar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminBlogsList')}}">
                                <i class="bi bi-newspaper" id="headericon"></i>
                                <span class="nav-link-title">Bloglar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminMarkalarList')}}">
                                <i class="bi bi-image-fill" id="headericon"></i>
                                <span class="nav-link-title">Galeri</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminSliderList')}}">
                                <i class="bi bi-images" id="headericon"></i>
                                <span class="nav-link-title">Sliders</span>
                            </a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="{{route('adminPopupList')}}">
                                <i class="bi bi-file-break-fill" id="headericon"></i>
                                <span class="nav-link-title">Pop-up</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminBorsaList')}}">
                                <i class="bi bi-bar-chart-line" id="headericon"></i>
                                <span class="nav-link-title">Veriler</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <i class="bi bi-calendar-plus" id="headericon"></i>
                                <span class="nav-link-title">Investments</span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="{{route('adminInvestNew')}}">New Transactions</a>
                                        <a class="dropdown-item" href="{{route('adminInvestProcess')}}">Processed</a>
                                        <a class="dropdown-item" href="{{route('adminInvestComplated')}}">Complete</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminSirketList')}}">
                                <i class="bi bi-bar-chart-line" id="headericon"></i>
                                <span class="nav-link-title">Companies</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminCatsList')}}">
                                <i class="bi bi-tags-fill" id="headericon"></i>
                                <span class="nav-link-title">Kategoriler</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminProductList')}}">
                                <i class="bi bi-box-seam-fill" id="headericon"></i>
                                <span class="nav-link-title">Ürünler</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminUyelikKategorisiList')}}">
                                <i class="bi bi-people-fill" id="headericon"></i>
                                <span class="nav-link-title">Üyelik Türü</span>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminBankaList')}}">
                                <i class="bi bi-bank" id="headericon"></i>
                                <span class="nav-link-title">Bank Accounts</span>
                            </a>
                        </li>
                        @if(\Illuminate\Support\Facades\Session::get('usergroup')==1)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <i class="bi bi-people-fill" id="headericon"></i>
                                    <span class="nav-link-title">Kullanıcılar</span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="{{route('adminUsersList')}}">Bütün Kullanıcılar</a>
                                            <a class="dropdown-item" href="{{route('adminUsersOnaysizList')}}">Onay Bekleyenler</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <i class="bi bi-gear-wide-connected" id="headericon"></i>
                                <span class="nav-link-title">Genel Ayarlar</span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="{{route('adminSiteSettings')}}">Site Ayarları</a>
                                        <a class="dropdown-item" href="{{route('adminLangSettings')}}">Dil Ayarları</a>
                                        <!-- <a class="dropdown-item" href="{{route('adminSmtpSettings')}}">SMTP Ayarları</a>-->
                                        <a class="dropdown-item" href="{{route('adminContactSettings')}}">İletişim Ayarları</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <!-- ÜST MENÜ BİTİŞ -->
                </div>
            </div>
        </div>
    </div>
    <style>
        footer{
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
    <div class="page-wrapper">
        @yield('icerik')

        <!-- FOOTER BAŞLANGIÇ -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-12 text-center">
                        <a href="https://mindsmartofis.com" target="_blank"><strong>Mind Smart Ofis</strong></a> Tüm hakları saklıdır.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER BİTİŞ -->
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="{{asset('adminas/js/tabler.min.js')}}"></script>
<script src="{{asset('adminas/js/demo.min.js')}}"></script>
</body>
</html>
