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
                    @if(isset($diller) and !empty($diller[0]))


                        <div class="card-header" style="border: none">
                            <h4 class="card-title">Yeni Sayfa Ekle</h4>
                        </div>
                        <div class="card-tabs">
                            <!-- Cards navigation -->
                            <ul class="nav nav-tabs" style="background: white;border-left: 1px solid #e6e7e9;border-top: 1px solid #e6e7e9;border-right: 1px solid #e6e7e9;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                @foreach($diller as $dil)
                                    <button style="border: none;margin: 10px" class="tablink" onclick="openPage('{{$dil->diletiket}}', this, '#e5e5e5')" id="defaultOpen">{{$dil->dilbaslik}}</button>
                                @endforeach
                            </ul>
                            <form action="{{route('adminAddPagesPost')}}" method="post" class="card" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        @php $rand=rand(1111111,999999); @endphp

                                        @foreach($diller as $dil)
                                            <input type="hidden" name="dil[]" value="{{$dil->dilbaslik}}">
                                            <input type="hidden" name="diletiket[]" value="{{$dil->diletiket}}">
                                            <input type="hidden" name="pagesid" value="{{$rand}}">
                                            <div id="{{$dil->diletiket}}" class="col-md-9 tabcontent">
                                                <div class="col-md-9 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Başlık</label>
                                                            <input type="text" class="form-control" name="baslik[]" placeholder="Sayfa Başlık"/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Kısa Açıklama</label>
                                                            <input type="text" class="form-control" name="kisaaciklama[]" placeholder="Kısa Açıklama Giriniz"/>
                                                        </div>
                                                        <div class="col-md-12 col-lg-12 mb-3">
                                                            <style>
                                                                .ck-editor__editable {
                                                                    min-height: 200px;
                                                                }
                                                            </style>
                                                            <label class="form-label">İçerik</label>
                                                            <textarea name="icerik[]" id="editor{{$dil->diletiket}}" cols="30" rows="10"></textarea>
                                                            <script>
                                                                CKEDITOR.replace( 'editor{{$dil->diletiket}}' );
                                                            </script>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">SEO Başlık</label>
                                                            <input type="text" class="form-control" name="seobaslik[]" placeholder="SEO Başlık Giriniz"/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">SEO Açıklama</label>
                                                            <input type="text" class="form-control" name="seoaciklama[]" placeholder="SEO Açıklama Giriniz"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                        <div class="col">

                                            <div class="mt-3">
                                                <fieldset class="form-fieldset">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Sayfa Görsel</label>
                                                        <input type="file" class="form-control" name="image" id="inputGroupFile02">
                                                    </div>
                                                    @php
                                                        $sonsira=\App\Models\sitePages::orderBy('sira','DESC')->first();
                                                    @endphp
                                                    <div class="col-md-12 col-lg-12 mb-3">
                                                        <label class="form-label">Sıra</label>
                                                        <input type="text" class="form-control" name="sira" value="{{$sonsira->sira+1}}"/>
                                                    </div>
                                                    <div class="col-md-12 col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Sitede gözüksün mü?</label>
                                                            <label class="switch">
                                                                <input name="durum" type="hidden" value="2" >
                                                                <input name="durum" type="checkbox" value="1">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <button style="width: 100%;" type="submit" class="btn btn-block btn-success btn-lg"> Ekle
                                                        <svg style="margin-left:5px;" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>  </button>
                                                </fieldset>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            @else

                            @endif
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
