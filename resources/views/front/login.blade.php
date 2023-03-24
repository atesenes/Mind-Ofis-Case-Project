@extends('front.layout.layout')
@section('title','Kafa Yapan Adam')

@section('icerik')
    <section class="breadcrumb-area breadcrumb-bg" data-background="frontas/img/black.jpg">
        <div class="container">
            <div class="col-xl-8 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Giriş Yap</h5>
                    </div>
                    <div class="contact-form">
                        <form action="{{ route('frontLoginPost') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="email" placeholder="{{ __('front.email') }} *">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="password" name="password" placeholder="{{ __('front.sifre') }} *">
                                </div>
                            </div>
                            <button class="btn">{{ __('front.girisyap') }}</button> <br>
                            <p class="mt-4 mb-0 size-16">
                                Hesabınız Yok mu ? <a href="{{ route('frontRegister') }}"
                                                      class="link link-dark-primary-2 link-normal animsition-link"> Hesap
                                    oluşturun</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
