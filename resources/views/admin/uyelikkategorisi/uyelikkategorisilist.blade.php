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
                    <p class="empty-title">Henüz üyelik kategorisi eklenmemiş.</p>
                    <p class="empty-subtitle text-muted">
                        Hemen yeni bir kategori ekle.
                    </p>
                    <div class="empty-action">
                        <a href="{{route('adminUyelikKategorisiAdd')}}" class="btn btn-success">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <i class="bi bi-people-fill" id="headericon"></i>
                            Üye Kategorisi Ekle
                        </a>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Galeri</h3>
                            <a href="{{route('adminUyelikKategorisiAdd')}}"><button style="position: absolute;right:15px;top:15px;" class="btn btn-sm btn-success">Üye Kategorisi Ekle</button></a>
                        </div>
                        <!-- DATATABLES BAŞI -->
                        <div style="padding: 10px;" class="table-responsive">


                            <table id="datatables" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width: 30px">#ID</th>
                                    <th style="width: 500px">Kulüp İsmi</th>
                                    <th style="width: 50px">İndirim Oranı</th>
                                    <th style="width: 50px">Durum</th>
                                    <th style="width: 70px">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $veri)
                                    <tr>
                                        <td>#{{$veri->id}}</td>
                                        <td>{{$veri->kulupismi}}</td>
                                        <td>%{{$veri->indirimorani}}</td>
                                        <td>
                                            @if($veri->durum==1)
                                                <label class="switch">
                                                    <input onchange="window.location='{{ route('adminUyelikKategoriDurumEdit',['id'=>$veri->id]) }}'" type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            @else
                                                <label class="switch">
                                                    <input onchange="window.location='{{ route('adminUyelikKategoriDurumEdit',['id'=>$veri->id]) }}'" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('adminUyelikKategorisiEdit',['id'=>$veri->id])}}"><button class="btn btn-sm btn-light" style="width: 100%;margin-bottom: 5px">Düzenle</button></a>
                                            <br>
                                            <a href="{{route('adminUyelikKategorisiDel',['id'=>$veri->id])}}"><button class="btn btn-sm btn-light" style="width: 100%">Sil</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th style="width: 500px">Kulüp İsmi</th>
                                    <th style="width: 50px">İndirim Oranı</th>
                                    <th style="width: 50px">Durum</th>
                                    <th style="width: 70px">İşlem</th>
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
