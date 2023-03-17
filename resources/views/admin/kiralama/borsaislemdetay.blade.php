@extends('admin.layout.layout') @section('icerik')
    <!-- İÇERİK BAŞLANGIÇ -->
    <div class="container-xl"></div>
    <div class="page-body">
        <div class="container-xl" style="margin-bottom: 30px;">
            <div class="row row-cards">
                <div class="col-12">
                    @if(Session::has('basarimesaji'))
                        <div class="alert alert-success">
                            {{ Session::get('basarimesaji') }}
                        </div>
                    @endif @if(Session::has('hatamesaji'))
                        <div class="alert alert-danger">
                            {{ Session::get('hatamesaji') }}
                        </div>
                    @endif
                    <div class="card-header" style="border: none;">
                        <h4 class="card-title">Investments</h4>
                    </div>
                    <div class="card-tabs">
                        <!-- Cards navigation -->
                        <ul class="nav nav-tabs" style="background: white; border-left: 1px solid #e6e7e9; border-top: 1px solid #e6e7e9; border-right: 1px solid #e6e7e9; border-top-left-radius: 10px; border-top-right-radius: 10px;"></ul>
                        <form class="card" autocomplete="off" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9 col-xl-12">
                                        <div class="row">
                                            <h4 style="text-decoration: underline">Informations</h4>
                                            @php
                                                $user=\App\Models\site_user_information::where('userid','=',$data->userid)->first();
                                            @endphp
                                            <div class="col-4">
                                                <p><span style="font-weight: 700">Name Surname:</span> {{ucfirst($user->firstname)}} {{ucfirst($user->lastname)}}</p>
                                                <p><span style="font-weight: 700">ISIN:</span> {{$data->isinno}} -> <a href="{{route('adminBorsaList')}}">Detail</a> </p>
                                                <p><span style="font-weight: 700">Amount:</span> {{$data->amount}} €</p>
                                                <p><span style="font-weight: 700">Interest Side:</span>@if($data->process=="purchase") Purchase @else Transfer @endif</p>
                                                @if($data->process=="payout")
                                                    @php
                                                        $sirketdetay=\App\Models\siteBorsaSirketler::where('sirketid','=',$data->sirketname)->first();
                                                    @endphp
                                                    <p><span style="font-weight: 700">Transfer Company Name:</span>
                                                        {{$sirketdetay->sirketname}}   </p>
                                                @endif
                                            </div>
                                            <br>
                                            <div class="col-4 mb-3">
                                                <p><span style="font-weight: 700">Name Surname:</span> {{ucfirst($user->firstname)}} {{ucfirst($user->lastname)}}</p>
                                                <p><span style="font-weight: 700">Email:</span> {{$user->email}} </p>
                                                <p><span style="font-weight: 700">Phone:</span> {{$user->phone}} </p>
                                                <p><span style="font-weight: 700">Banka Name:</span> {{$user->bankname}}</p>
                                                <p><span style="font-weight: 700">IBAN:</span> {{$user->iban}} </p>
                                                <p><span style="font-weight: 700">Account Number:</span> {{$user->account_number}}</p>
                                                <p><span style="font-weight: 700">Brabch Code:</span> {{$user->brabch_code}}</p>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <p><span style="font-weight: 700">Status Change:</span> </p>
                                                <select onselect="durumDegis()" id="durumdegis" name="isinno" class="form-select" aria-label="Default select example">
                                                    <option  disabled>İşlem Seçiniz</option>
                                                    <option @if($data->durum==0) selected @endif value="0">Yeni İşlem</option>
                                                    <option @if($data->durum==1) selected @endif value="1">İşleme Alındı</option>
                                                    <option @if($data->durum==2) selected @endif value="2">Tamamlandı</option>
                                                </select>
                                            </div>
                                            <br>
                                            <p>We wish you a pleasant day.</p>
                                        </div>
                                        <script>
                                            let e = document.getElementById("durumdegis");
                                            function durumDegis() {
                                                if (e.value==0){
                                                    window.location = "/admin/investment/durumdegis/<?=$data->id?>/"+e.value;
                                                }
                                                if (e.value==1){
                                                    window.location = "/admin/investment/durumdegis/<?=$data->id?>/"+e.value;
                                                }
                                                if (e.value==2){
                                                    window.location = "/admin/investment/durumdegis/<?=$data->id?>/"+e.value;
                                                }
                                            }
                                            e.onchange = durumDegis;
                                        </script>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </div>
