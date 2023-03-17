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
                    <form action="{{route('adminUserEditPost')}}" method="post" class="card" autocomplete="off">
                        @csrf
                        <input name="id" type="hidden" value="{{$data->id}}">
                        <div class="card-header">
                            <h4 class="card-title">Kullanıcı Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="col-md-9 col-xl-12">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">İsim</label>
                                                <input type="text" class="form-control" name="firstname" value="{{$data->firstname}}"/>
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Soyisim</label>
                                                <input type="text" class="form-control" name="lastname" value="{{$data->lastname}}"/>
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">E-Posta</label>
                                                <input type="text" class="form-control" name="email" value="{{$data->email }}"/>
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-3">
                                                <label class="form-label">Telefon</label>
                                                <input type="text" class="form-control" name="phone" value="{{$data->phone}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="mt-3">
                                        <fieldset class="form-fieldset">
                                            <div class="col-md-12 col-lg-12 mb-3">
                                                <label class="form-label">Şifre</label>
                                                <input type="text" class="form-control" name="password" placeholder="Şifre Giriniz" />
                                            </div>
                                            <div class="col-md-12 col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Yönetici mi?</label>
                                                    <label class="switch">
                                                        <input name="usergroup" type="hidden" value="2" >
                                                        <input name="usergroup" type="checkbox" value="1" @if($data->usergroup==1) checked @endif>
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
                    <div style="background: white" class="card-body">
                        <h5>Pasaport Kontrol</h5>
                        <div class="row">
                            @php
                                $userinfo=\App\Models\site_user_information::where('userid','=',$data->id)->first();
                            @endphp
                            @if($userinfo->passport_onay==1)
                                <div class="col-md-6 col-lg-6 mb-3">
                                    <label class="form-label">Front</label>
                                    <a target="_blank" href="{{$userinfo->passport_front}}"><img style="width: 250px;height: 250px;" src="{{$userinfo->passport_front}}" alt="passport_front"></a>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-3">
                                    <label class="form-label">Back</label>
                                    <a target="_blank" href="{{$userinfo->passport_back}}"><img style="width: 250px;height: 250px;" src="{{$userinfo->passport_back}}" alt="passport_back"></a>
                                </div>
                                <div class="col-12 text-center">
                                    <p>Pasaport Onayı</p>
                                    <a href="{{route('adminPassportOnay',['userid'=>$userinfo->userid])}}"><button style="margin-right: 10px" class="btn btn-success btn-sm">Onayla</button></a> |
                                    <a href="{{route('adminPassportRet',['userid'=>$userinfo->userid])}}"><button style="margin-left: 10px" class="btn btn-danger btn-sm">Reddet</button></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- İÇERİK SONU -->
@endsection
