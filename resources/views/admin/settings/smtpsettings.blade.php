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
                    <form action="{{route('adminSmtpSettingsPost')}}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">SMTP Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="col-md-9 col-xl-12">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">SMTP Port</label>
                                                <input type="text" class="form-control" name="smtpport" @if(empty($data->smtpport)) placeholder="SMTP Port Giriniz" @else value="{{$data->smtpport}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Gönderen Başlığı</label>
                                                <input type="text" class="form-control" name="smtpgonderibasligi" @if(empty($data->smtpgonderibasligi)) placeholder="Gönderici Başlığını Giriniz" @else value="{{$data->smtpgonderibasligi}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">SMTP Server</label>
                                                <input type="text" class="form-control" name="smtpserver" @if(empty($data->smtpserver)) placeholder="SMTP Server Giriniz" @else value="{{$data->smtpserver}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">SMTP Protokol</label>
                                                <input type="text" class="form-control" name="smtpprotokol" @if(empty($data->smtpprotokol)) placeholder="SMTP Protokol Giriniz" @else value="{{$data->smtpprotokol}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">SMTP E-Posta</label>
                                                <input type="text" class="form-control" name="smtpeposta" @if(empty($data->smtpeposta)) placeholder="SMTP Eposta Giriniz" @else value="{{$data->smtpeposta}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">SMTP Şifre</label>
                                                <input type="text" class="form-control" name="smtpsifre" @if(empty($data->smtpsifre)) placeholder="SMTP Şifre Giriniz" @else value="{{$data->smtpsifre}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Test E-Posta Adresi</label>
                                                <input type="text" class="form-control" name="smtptesteposta" @if(empty($data->smtptesteposta)) placeholder="SMTP Test Epostasını Giriniz" @else value="{{$data->smtptesteposta}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">İletilerin Gönderileceği Adres</label>
                                                <input type="text" class="form-control" name="smtpiletilecekeposta" @if(empty($data->smtpiletilecekeposta)) placeholder="İletilerin Gönderileceği Eposta Adresini Giriniz" @else value="{{$data->smtpiletilecekeposta}}" @endif />
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
