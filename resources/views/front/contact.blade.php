@extends('front.layout.layout')
@section('title','Kafa Yapan Adam')

@section('icerik')
    <section class="breadcrumb-area breadcrumb-bg" data-background="frontas/img/black.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">İletişim</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontIndex') }}">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('frontContact') }}">İletişim</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area contact-bg" data-background="frontas/img/bg/contact_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-form-wrap">
                        <div class="widget-title mb-50">
                            <h5 class="title">Tavsiyeleriniz?</h5>
                        </div>
                        <div class="contact-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Adınız *">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" placeholder="E Mail *">
                                    </div>
                                </div>
                                <input type="text" placeholder="Konu *">
                                <textarea name="message" placeholder="Mesajınızı İletin..."></textarea>
                                <button class="btn">Mesaj Gönder</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="widget-title mb-50">
                        <h5 class="title">Beni Takip Edin</h5>
                    </div>
                    <div class="contact-info-wrap">
                        <div class="contact-info-list">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"> <span style="margin-left: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;" >Kafayapanadam</span> </i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"> <span style="margin-left: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">Kafayapanadam</span></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"> <span style="margin-left: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">Kafayapanadam</span></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"> <span style="margin-left: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">Kafayapanadam</span></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
