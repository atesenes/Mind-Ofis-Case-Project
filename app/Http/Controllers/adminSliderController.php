<?php

namespace App\Http\Controllers;

use App\Models\siteLanguage;
use App\Models\siteSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class adminSliderController extends Controller
{
    //Admin Slider Listeleme - Başlangıç
    public function adminSliderList()
    {
        //Herhangi bir slider olup olmadığını kontrol ediyoruz.
        $c=siteSlider::count();
        if(!$c==0){
            //Daha önceden bir slider eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteSlider::where('diletiket','=',Session::get('dil'))->get();
            return view('admin.slider.sliderlist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.slider.sliderlist',['data'=>0]);
        }
    }
    //Admin Slider Listeleme - Bitiş

    //Admin Slider Ekleme - Başlangıç
    public function adminAddSlider()
    {
        $diller=siteLanguage::all();
        return view('admin.slider.addslider',['diller'=>$diller]);
    }
    //Admin Slider Ekleme - Bitiş

    //Admin Slider Düzenleme - Başlangıç
    public function adminSliderEdit($sliderid)
    {
        $c=siteSlider::where('sliderid','=',$sliderid)->count();
        if(!$c==0){
            $diller=siteLanguage::all();
            $data=siteSlider::where('sliderid','=',$sliderid)->get();
            return view('admin.slider.editslider',['data'=>$data],['diller'=>$diller]);
        }
    }
    //Admin Slider Düzenleme - Bitiş

    //Eklenmiş dillere göre slider ekleme - Başlangıç
    public function adminAddSliderPost(Request $request)
    {
        $input=$request->except('_token');
        if (!isset($input['sira'])){
            //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
            $input['sira']=1;
        }
        //Slider İmage Kaydetme
        if (!$request->image){
            return redirect()->back()->with('hatamesaji','Slider için herhangi bir görsel seçmediğiniz için kayıt edilemedi.');
        }
        $imageName = 'slider'.time().'.'.$request->image->extension();
        // Public Folder
        $upload=$request->image->move(public_path('uploadimage/slider'), $imageName);
        $dbname='uploadimage/slider/'.$imageName;
        $input['image']=$dbname;
        $toplam=count($input['dil']);
        for ($i=0;$i<$toplam;$i++){
            $kaydet=DB::table('site_sliders')->insert([
                'sliderid' => $input['sliderid'],
                'baslik' => $input['baslik'][$i],
                'dislikmetin' => $input['dislikmetin'][$i],
                'dislik' => $input['dislik'][$i],
                'kisaaciklama' => $input['kisaaciklama'][$i],
                'sira' => $input['sira'],
                'durum' => $input['durum'],
                'dil' => $input['dil'][$i],
                'diletiket' => $input['diletiket'][$i],
                'image' => $input['image']
            ]);
        }
        if ($kaydet){
            return redirect()->route('adminSliderList')->with('basarimesaji','Slider başarıyla kayıt edildi.');
        }else{
            return redirect()->route('adminSliderList')->with('hatamesaji','Slider eklenirken bir hata ile karşılaşıldı.');
        }
    }
    //Eklenmiş dillere göre slider ekleme - Başlangıç

    //Admin Slider Düzenleme Post - Başlangıç
    public function adminSliderEditPost(Request $request)
    {
        $input=$request->except('_token');
        $c=siteSlider::where('id','=',$input['id'])->count();
        if(!$c==0){
            //Eğer yeni görsel gelmediyse eski görsel kalıyor.
            if (!isset($input['sira']) or $input['sira']==null){
                //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
                $input['sira']=1;
            }
            if(!isset($input['image'])){
                $input['image']=$input['oldimage'];
                unset($input['oldimage']);
            }else{
                File::delete($input['oldimage']);
                unset($input['oldimage']);
                //Slider İmage Kaydetme
                $imageName = 'slider'.time().'.'.$input['image']->extension();
                // Public Folder
                $upload=$request->image->move(public_path('uploadimage/slider'), $imageName);
                $dbname='uploadimage/slider/'.$imageName;
                $input['image']=$dbname;
            }

            if(isset($input['durum']) and $input['durum']=="on"){
                $input['durum']=1;
            }else{
                $input['durum']=2;
            }


            $toplam=count($input['dil']);
            for ($i=0;$i<$toplam;$i++){
                $guncelle=DB::table('site_sliders')
                    ->where('id','=',$input['id'][$i])
                    ->update([
                    'baslik' => $input['baslik'][$i],
                    'dislikmetin' => $input['dislikmetin'][$i],
                    'dislik' => $input['dislik'][$i],
                    'kisaaciklama' => $input['kisaaciklama'][$i],
                    'sira' => $input['sira'],
                    'durum' => $input['durum'],
                    'dil' => $input['dil'][$i],
                    'diletiket' => $input['diletiket'][$i],
                    'image' => $input['image']
                ]);
            }

            return redirect()->route('adminSliderList')->with('basarimesaji','Slider güncellemesi başarıyla gerçekleşti.');
        }else{
            return redirect()->route('adminSliderList')->with('hatamesai','Slider güncellenirken bir hata oluştu.');
        }
    }
    //Admin Slider Düzenleme Post - Bitiş



    //Slider sayfasından JS ile dil aktifleştirme - Başlangıç
    function adminSliderdurumEdit($sliderid)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=siteSlider::where('sliderid','=',$sliderid)->count();
        if(!$c==0){
            $data=siteSlider::where('sliderid','=',$sliderid)->get();
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                if ($data[$i]['durum']==1){
                    //Slider açık ise kapatıyoruz
                    $guncelle=siteSlider::where('id','=',$data[$i]['id'])->update(['durum'=>2]);
                }else{
                    //Slider kapalı ise açıyoruz
                    $guncelle=siteSlider::where('id','=',$data[$i]['id'])->update(['durum'=>1]);
                }
            }
            return redirect()->route('adminSliderList')->with('basarimesaji','Slider durum güncellemesi başarılı.');
        }else{
            return redirect()->back()->with('hatamesaji','Slider durum hata oluştu.');
        }
    }
    //Slider sayfasından JS ile dil aktifleştirme - Bitiş

    //Slider sayfasından JS ile dil aktifleştirme - Başlangıç
    function adminSliderDel($sliderid)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=siteSlider::where('sliderid','=',$sliderid)->count();
        if(!$c==0){
            $data=siteSlider::where('sliderid','=',$sliderid)->get();
            File::delete($data[0]['image']);
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                $sil=siteSlider::where('id','=',$data[$i]['id'])->delete();
            }
            return redirect()->route('adminSliderList')->with('basarimesaji','Slider başarıyla silindi.');
        }else{
            return redirect()->back()->with('hatamesaji','Slider silinirken hata oluştu.');
        }
    }
    //Slider sayfasından JS ile dil aktifleştirme - Bitiş



}
