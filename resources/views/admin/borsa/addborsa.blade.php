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
                            <h4 class="card-title">Yeni Veri Ekle</h4>
                        </div>
                        <div class="card-tabs">
                            <!-- Cards navigation -->
                            <ul class="nav nav-tabs" style="background: white;border-left: 1px solid #e6e7e9;border-top: 1px solid #e6e7e9;border-right: 1px solid #e6e7e9;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                @foreach($diller as $dil)
                                    <button style="border: none;margin: 10px" class="tablink" onclick="openPage('{{$dil->diletiket}}', this, '#e5e5e5')" id="defaultOpen">{{$dil->dilbaslik}}</button>
                                @endforeach
                            </ul>
                            <form action="{{route('adminAddBorsaPost')}}" method="post" class="card" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        @foreach($diller as $dil)
                                            <div id="{{$dil->diletiket}}" class="col-md-9 tabcontent">
                                                <div class="col-md-9 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">ISIN</label>
                                                            <input type="text" class="form-control" name="isin" placeholder="ISIN Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">WKN</label>
                                                            <input type="text" class="form-control" name="wkn" placeholder="Ticker Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">NAME</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Ticker Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Ticker</label>
                                                            <input type="text" class="form-control" name="ticker" placeholder="Ticker Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Shortname</label>
                                                            <input type="text" class="form-control" name="shortname" placeholder="Shortname Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Issuer</label>
                                                            <input type="text" class="form-control" name="issuer" placeholder="Issuer Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Country</label>
                                                            <input type="text" class="form-control" name="country" placeholder="Country Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Type</label>
                                                            <input type="text" class="form-control" name="type" placeholder="Type Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Currency</label>
                                                            <input type="text" class="form-control" name="currency" placeholder="Currency Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 mb-3">
                                                            <label class="form-label">Price</label>
                                                            <input type="text" class="form-control" name="price" placeholder="Currency Giriniz" required/>
                                                        </div>
                                                        <div class="col-md-12 col-lg-12 mb-3">
                                                            <style>
                                                                .ck-editor__editable {
                                                                    min-height: 200px;
                                                                }
                                                            </style>
                                                            <label class="form-label">Other Details</label>
                                                            <textarea name="other_details" id="editor{{$dil->diletiket}}" cols="30" rows="10"></textarea>
                                                            <script>
                                                                CKEDITOR.replace( 'editor{{$dil->diletiket}}' );
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                        <div class="col">

                                            <div class="mt-3">
                                                <fieldset class="form-fieldset">
                                                    @php
                                                        $sonsira=\App\Models\siteKurumsal::orderBy('sira','DESC')->first();
                                                    @endphp
                                                    <div class="col-md-12 col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Sitede gözüksün mü?</label>
                                                            <label class="switch">
                                                                <input name="durum" type="hidden" value="2" >
                                                                <input name="durum" checked type="checkbox" value="1">
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
