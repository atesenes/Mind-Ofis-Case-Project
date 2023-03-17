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
                    <form action="{{route('adminAddLangSettingsPost')}}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Site Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="col-md-9 col-xl-12">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 mb-3">
                                                <label class="form-label">Dil Başlık</label>
                                                <input type="text" class="form-control" name="dilbaslik" />
                                            </div>
                                            <div class="col-md-12 col-lg-612 mb-3">
                                                <label class="form-label">Dil Etiket</label>
                                                <input type="text" class="form-control" name="diletiket" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="mt-3">
                                        <fieldset class="form-fieldset">
                                            <div class="col-md-12 col-lg-12 mb-3">
                                                <label class="form-label">Dil Sıra</label>
                                                <input type="text" class="form-control" name="dilsira" @if(empty($data->siteaciklama)) placeholder="Site Açıklama Giriniz" @else value="{{$data->siteaciklama}}" @endif />
                                            </div>
                                            <div class="col-md-12 col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Sitede gözüksün mü?</label>
                                                    <label class="switch">
                                                        <input name="dildurum" type="checkbox" value="">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Varsayılan olsun mu?</label>
                                                    <label class="switch">
                                                        <input name="dilvarsayilan" type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
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
