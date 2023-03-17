@extends('admin.layout.layout')

@section('icerik')
    <!-- İÇERİK BAŞLANGIÇ -->
    <div class="container-xl"></div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    @if(Session::has('basarimesaji'))
                        <div class="alert alert-success">
                            {{ Session::get('basarimesaji') }}
                        </div>
                    @endif
                    @if(Session::has('hatamesaji'))
                        <div class="alert alert-danger">
                            {{ Session::get('hatamesaji') }}
                        </div>
                    @endif
                    <form action="{{route('adminContactSettingsPost')}}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">İletişim Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="col-md-9 col-xl-12">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Genel Eposta Bilgisi</label>
                                                <input type="text" class="form-control" name="siteeposta" @if(empty($data->siteeposta)) placeholder="Genel E-Posta Bilgisi" @else value="{{$data->siteeposta}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Genel Adres Bilgisi</label>
                                                <input type="text" class="form-control" name="siteadres" @if(empty($data->siteadres)) placeholder="Genel Adres Bilgisi" @else value="{{$data->siteadres}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Genel İletişim Numarası</label>
                                                <input type="text" class="form-control" name="sitetelno" @if(empty($data->sitetelno)) placeholder="Genel İletişim Numarası" @else value="{{$data->sitetelno}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Genel Whatsapp Numarası</label>
                                                <input type="text" class="form-control" name="siteikincitelno" @if(empty($data->siteikincitelno)) placeholder="Genel Whatsapp Numarası" @else value="{{$data->siteikincitelno}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Site Genel Numara</label>
                                                <input type="text" class="form-control" name="sitewhatsapp" @if(empty($data->sitewhatsapp)) placeholder="Site Genel Numara" @else value="{{$data->sitewhatsapp}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Çalışma Saatleri</label>
                                                <input type="text" class="form-control" name="sitecalismasaati" @if(empty($data->sitecalismasaati)) placeholder="Çalışma Saatleri" @else value="{{$data->sitecalismasaati}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Facebook Adresi</label>
                                                <input type="text" class="form-control" name="sitefacebook" @if(empty($data->sitefacebook)) placeholder="Facebook Bağlantısı" @else value="{{$data->sitefacebook}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Twitter Adresi</label>
                                                <input type="text" class="form-control" name="sitetwitter" @if(empty($data->sitetwitter)) placeholder="Twitter Bağlantısı" @else value="{{$data->sitetwitter}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Instagram Adresi</label>
                                                <input type="text" class="form-control" name="siteinstagram" @if(empty($data->siteinstagram)) placeholder="Instagram Bağlantısı" @else value="{{$data->siteinstagram}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Youtube Adresi</label>
                                                <input type="text" class="form-control" name="siteyoutube" @if(empty($data->siteyoutube)) placeholder="Youtube Bağlantısı" @else value="{{$data->siteyoutube}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Linkedin Adresi</label>
                                                <input type="text" class="form-control" name="sitelinkedin" @if(empty($data->sitelinkedin)) placeholder="Linkedin Bağlantısı" @else value="{{$data->sitelinkedin}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Harita Embed</label>
                                                <textarea class="form-control" name="siteharita" rows="6" placeholder="Site Harita Kodunu Giriniz">@if(!empty($data->siteharita)){{$data->siteharita}}@endif</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="mt-3">
                                        <fieldset class="form-fieldset">
                                            <button style="width: 100%;" type="submit" class="btn btn-block btn-success btn-lg"> Kaydet
                                                <svg style="margin-left:5px;" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>  </button>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- İÇERİK SONU -->
@endsection
