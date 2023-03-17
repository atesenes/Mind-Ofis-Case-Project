@extends('admin.layout.layout')

@section('icerik')
    <!-- İÇERİK BAŞLANGIÇ -->
    <div class="container-xl"></div>
    <div class="page-body">
        <div class="container-xl" style="margin-bottom: 30px">
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
                    <div class="card-header" style="border: none">
                        <h4 class="card-title">Görsel Güncelle</h4>
                    </div>
                    <div class="card-tabs">
                        <form action="{{route('adminEditMarkaPost')}}" method="post" class="card" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9 tabcontent">
                                        <div class="col-md-9 col-xl-12">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <label class="form-label">Görsel</label>
                                                    <input type="text" class="form-control" name="İsim" value="{{$data->baslik}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">

                                        <div class="mt-3">
                                            <fieldset class="form-fieldset">
                                                <div class="mb-3">
                                                    <img src="{{asset($data->image)}}" alt="">
                                                    <input type="hidden" class="form-control" name="oldimage" value="{{$data['image']}}" id="inputGroupFile02">
                                                    <small>Eğer yeni görsel iletmezseniz eski görsel ile devam edilecektir.</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Galeri Görsel</label>
                                                    <input type="file" class="form-control" name="image" id="inputGroupFile02">
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <label class="form-label">Sıra</label>
                                                    <input type="text" class="form-control" name="sira" value="1"/>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Sitede gözüksün mü?</label>
                                                        @if($data->durum==1)
                                                            <label class="switch">
                                                                <input name="durum" type="checkbox" checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="hidden" name="durum" value="2">
                                                                <input name="durum" type="checkbox">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button style="width: 100%;" type="submit" class="btn btn-block btn-success btn-lg"> Güncelle
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
        <script>
            function openPage(pageName,elmnt,color) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }
                document.getElementById(pageName).style.display = "block";
                elmnt.style.backgroundColor = color;
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
@endsection
