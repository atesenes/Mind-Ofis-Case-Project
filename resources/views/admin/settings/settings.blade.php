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
                    <form action="{{route('adminSiteSettingsUpdate')}}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Site Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="col-md-9 col-xl-12">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Site Başlık</label>
                                                <input type="text" class="form-control" name="sitebaslik" @if(empty($data->sitebaslik)) placeholder="Site Başlığını Giriniz" @else value="{{$data->sitebaslik}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Site Açıklama</label>
                                                <input type="text" class="form-control" name="siteaciklama" @if(empty($data->siteaciklama)) placeholder="Site Açıklama Giriniz" @else value="{{$data->siteaciklama}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Copyright</label>
                                                <input type="text" class="form-control" name="copyright" @if(empty($data->copyright)) placeholder="Site Copyright Giriniz" @else value="{{$data->copyright}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Site URL</label>
                                                <input type="text" class="form-control" name="siteurl" @if(empty($data->siteurl)) placeholder="Site URL Giriniz" @else value="{{$data->siteurl}}" @endif />
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Site Meta HTML</label>
                                                <textarea class="form-control" name="sitemetahtml" rows="6" placeholder="Site Meta Taglarını Giriniz">@if(!empty($data->sitemetahtml)){{$data->sitemetahtml}}@endif</textarea>
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Site Sayaç Kodu</label>
                                                <textarea class="form-control" name="sitesayackodu" rows="6" placeholder="Site Sayaç Kodunu Giriniz">@if(!empty($data->sitesayackodu)){{$data->sitesayackodu}}@endif</textarea>
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
