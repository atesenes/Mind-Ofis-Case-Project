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
                    <p class="empty-title">Herhangi bir banka kaydı bulunamadı.</p>
                    <p class="empty-subtitle text-muted">
                        Hemen yeni bir banka ekle.
                    </p>
                    <div class="empty-action">
                        <a href="{{route('adminAddBanka')}}" class="btn btn-success">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <i class="bi bi-person-plus-fill" id="headericon"></i>
                            Yeni Banka Hesabı EKle
                        </a>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Banka Ayarları</h3>
                            <a href="{{route('adminAddBanka')}}"><button style="position: absolute;right:15px;top:15px;" class="btn btn-sm btn-success">Yeni Kullanıcı EKle</button></a>
                        </div>
                        <!-- DATATABLES BAŞI -->
                        <div style="padding: 10px;" class="table-responsive">


                            <table id="datatables" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Branch Code</th>
                                    <th>IBAN</th>
                                    <th>Durum</th>
                                    <th style="width: 70px">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $kullanici)
                                    <tr>
                                        <td style="text-align: center">{{$kullanici->id}}</td>
                                        <td>{{$kullanici->bank_name}}</td>
                                        <td>{{$kullanici->account_number }}</td>
                                        <td>{{$kullanici->branch_code }}</td>
                                        <td>{{$kullanici->iban }}
                                        <td>
                                            @if($kullanici->durum==1)
                                                <label class="switch">
                                                    <input onchange="window.location='{{ route('adminBankDurumDegis',['id'=>$kullanici->id]) }}'" type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            @else
                                                <label class="switch">
                                                    <input onchange="window.location='{{ route('adminBankDurumDegis',['id'=>$kullanici->id]) }}'" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('adminBankDel',['id'=>$kullanici->id])}}"><button class="btn btn-sm btn-light" style="width: 100%">Sil</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Branch Code</th>
                                    <th>IBAN</th>
                                    <th>Durum</th>
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
