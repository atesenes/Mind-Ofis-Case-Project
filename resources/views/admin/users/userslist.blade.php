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
                    <p class="empty-title">Yönetim paneli için bir kullanıcı bulunamadı.</p>
                    <p class="empty-subtitle text-muted">
                        Hemen yeni bir yönetici ekle.
                    </p>
                    <div class="empty-action">
                        <a href="{{route('adminAddUsers')}}" class="btn btn-success">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <i class="bi bi-person-plus-fill" id="headericon"></i>
                            Yeni Yönetici EKle
                        </a>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kullanıcı Ayarları</h3>
                            <a href="{{route('adminAddUsers')}}"><button style="position: absolute;right:15px;top:15px;" class="btn btn-sm btn-success">Yeni Kullanıcı EKle</button></a>
                        </div>
                        <!-- DATATABLES BAŞI -->
                        <div style="padding: 10px;" class="table-responsive">


                            <table id="datatables" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ad Soyad</th>
                                    <th>E-Posta</th>
                                    <th>Telefon</th>
                                    <th>Yetki</th>
                                    <th style="width: 70px">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $kullanici)
                                    <tr>
                                        <td style="text-align: center">{{$kullanici->id}}</td>
                                        <td>{{$kullanici->firstname}} {{$kullanici->lastname}}</td>
                                        <td>{{$kullanici->email }}</td>
                                        <td>{{$kullanici->phone }}</td>
                                        <td>
                                            @if($kullanici->usergroup==1)
                                                Yönetici
                                            @elseif($kullanici->usergroup==2)
                                                Moderatör
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('adminUserEdit',['id'=>$kullanici->id])}}"><button class="btn btn-sm btn-light" style="width: 100%;margin-bottom: 5px">Düzenle</button></a>
                                            <br>
                                            <a href="{{route('adminUserDel',['id'=>$kullanici->id])}}"><button class="btn btn-sm btn-light" style="width: 100%">Sil</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Ad Soyad</th>
                                    <th>E-Posta</th>
                                    <th>Telefon</th>
                                    <th>Yetki</th>
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
