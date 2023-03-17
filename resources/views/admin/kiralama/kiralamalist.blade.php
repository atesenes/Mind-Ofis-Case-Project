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
                    <p class="empty-title">Henüz bu durumda işlem yok gelmemiş.</p>
                </div>
            @else
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Investments</h3>
                        </div>
                        <!-- DATATABLES BAŞI -->
                        <div style="padding: 10px;" class="table-responsive">


                            <table id="datatables" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width: 150px">Interest Date</th>
                                    <th>ISIN</th>
                                    <th>Amount</th>
                                    <th>Piece</th>
                                    <th>Action Process</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $veri)
                                    <tr>
                                        <td style="text-align: center">{{ \Carbon\Carbon::parse($veri->created_at)->format('d/m/Y H:i:s')}}</td>
                                        <td>{{$veri->isinno}}</td>
                                        <td>{{$veri->amount}} €</td>
                                        <td>{{$veri->piece}}</td>
                                        <td>{{ucfirst($veri->process)}}</td>
                                        <td>
                                            @if($veri->durum==0)
                                                Yeni Talep
                                            @elseif($veri->durum==1)
                                                İşleme Alındı
                                            @else
                                                Tamamlandı
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('adminKiralamaDetay',['id'=>$veri->id])}}"><button class="btn btn-sm btn-light" style="width: 100%;margin-bottom: 5px">İncele</button></a>
                                            <br>
                                            <a href="{{route('adminKiralamaSil',['id'=>$veri->id])}}"><button class="btn btn-sm btn-light" style="width: 100%">Sil</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th style="width: 150px">Interest Date</th>
                                    <th>ISIN</th>
                                    <th>Amount</th>
                                    <th>Piece</th>
                                    <th>Action Process</th>
                                    <th>Status</th>
                                    <th>Detail</th>
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
