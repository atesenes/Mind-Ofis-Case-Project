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
                    <p class="empty-title">Henüz slider eklenmemiş.</p>
                    <p class="empty-subtitle text-muted">
                        Hemen yeni bir slider ekle.
                    </p>
                    <div class="empty-action">
                        <a href="{{route('adminAddSlider')}}" class="btn btn-success">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <i class="bi bi-images" id="headericon"></i>
                            Yeni Slider EKle
                        </a>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sliderlar</h3>
                            <a href="{{route('adminAddSlider')}}"><button style="position: absolute;right:15px;top:15px;" class="btn btn-sm btn-success">Yeni Slider EKle</button></a>
                        </div>
                        <!-- DATATABLES BAŞI -->
                        <div style="padding: 10px;" class="table-responsive">


                            <table id="datatables" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width: 30px">Sıra</th>
                                    <th>Slider</th>
                                    <th style="width: 500px">Başlık</th>
                                    <th>Tarih</th>
                                    <th>Durum</th>
                                    <th style="width: 70px">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $slider)
                                    <tr>
                                        <td style="text-align: center"><input disabled style="width: 35px;text-align: center;border:1px solid #cbcbcb" type="text" value="{{$slider->sira}}" name="sira"></td>
                                        <td style="width:50px;width:50px;"><img src="{{asset($slider->image)}}" alt="{{$slider->baslik}}"> </td>
                                        <td>{{$slider->baslik}}</td>
                                        <td>{{$slider->created_at }}</td>
                                        <td>
                                        @if($slider->durum==1)
                                            <label class="switch">
                                                <input onchange="window.location='{{ route('adminSliderdurumEdit',['id'=>$slider->sliderid]) }}'" type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        @else
                                            <label class="switch">
                                                <input onchange="window.location='{{ route('adminSliderdurumEdit',['id'=>$slider->sliderid]) }}'" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('adminSliderEdit',['id'=>$slider->sliderid])}}"><button class="btn btn-sm btn-light" style="width: 100%;margin-bottom: 5px">Düzenle</button></a>
                                            <br>
                                            <a href="{{route('adminSliderDel',['id'=>$slider->sliderid])}}"><button class="btn btn-sm btn-light" style="width: 100%">Sil</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Slider</th>
                                    <th>Başlık</th>
                                    <th>Durum</th>
                                    <th>Tarih</th>
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
