@extends('admin.layout.layout')

@section('icerik')
    <!-- İÇERİK BAŞLANGIÇ -->
    <script>
        $(document).ready(function () {
            $('#datatables').DataTable({
                "language":{
                    "url":"//cdn.datatables.net/plug-ins/1.10.12/i18n/Turkish.json"
                }
            });
        });
    </script>

    <div class="container-xl">
    </div>
    <div class="page-body">
        <div class="container-xl d-flex flex-column justify-content-center">
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
            </div>
            @if($data=="0")
                <div class="empty">
                    <p class="empty-title">Site için henüz bir dil eklenmemiş.</p>
                    <p class="empty-subtitle text-muted">
                        Hemen yeni bir dil ekle.
                    </p>
                    <div class="empty-action">
                        <a href="{{route('adminAddLangSettings')}}" class="btn btn-success">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Yeni Dil EKle
                        </a>
                    </div>
                </div>
            @else
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dil Ayarları</h3>
                        <a href="{{route('adminAddLangSettings')}}"><button style="position: absolute;right:15px;top:15px;" class="btn btn-sm btn-success">Yeni Dil EKle</button></a>
                    </div>
                    <!-- DATATABLES BAŞI -->
                    <div style="padding: 10px;" class="table-responsive">


                            <table id="datatables" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th style="width: 75%">Başlık</th>
                                    <th>Etiket</th>
                                    <th>Durum</th>
                                    <th>Varsayılan</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dil)
                                <tr>
                                    <td style="text-align: center"><input  style="width: 35px;text-align: center;border:1px solid #cbcbcb" type="text" value="1" name="sira"></td>
                                    <td>{{$dil->dilbaslik}}</td>
                                    <td style="text-align: center;">{{$dil->diletiket}}</td>
                                    <td style="text-align: center;">
                                        @if($dil->dildurum=="on")
                                            <label class="switch">
                                                <input onchange="window.location='{{ route('adminLangdurumEdit',['id'=>$dil->id]) }}'" type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        @else
                                            <label class="switch">
                                                <input onchange="window.location='{{ route('adminLangdurumEdit',['id'=>$dil->id]) }}'" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        @if($dil->dilvarsayilan=="on")
                                            <label class="switch">
                                                <input type="radio" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        @else
                                            <label class="switch">
                                                <input onchange="window.location='{{ route('adminLangVarsEdit',['id'=>$dil->id]) }}'" type="radio">
                                                <span class="slider round"></span>
                                            </label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('adminLangEdit',['id'=>$dil->id])}}"><button class="btn btn-sm btn-light" style="width: 100%;margin-bottom: 5px">Düzenle</button></a>
                                        <br>
                                        <a href="{{route('adminLangDel',['id'=>$dil->id])}}"><button class="btn btn-sm btn-light" style="width: 100%">Sil</button></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Başlık</th>
                                    <th>Etiket</th>
                                    <th>Durum</th>
                                    <th>Varsayılan</th>
                                    <th>İşlem</th>
                                </tr>
                                </tfoot>
                            </table>

                    </div>
                    <!-- DATATABLES SONU -->
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- İÇERİK SONU -->
@endsection
