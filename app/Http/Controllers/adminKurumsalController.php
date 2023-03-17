<?php

namespace App\Http\Controllers;

use App\Http\Helper\fHelper;
use App\Models\siteKurumsal;
use App\Models\siteLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class adminKurumsalController extends Controller
{

    //Admin Kurumsal Listeleme - Başlangıç
    public function adminKurumsalList()
    {
        //Herhangi bir kurumsal sayfa olup olmadığını kontrol ediyoruz.
        $c=siteKurumsal::count();
        if(!$c==0){
            //Daha önceden bir slider eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteKurumsal::where('diletiket','=',Session::get('dil'))->get();
            return view('admin.kurumsal.kurumsallist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.kurumsal.kurumsallist',['data'=>0]);
        }
    }
    //Admin Kurumsal Listeleme - Bitiş

    //Admin Kurumsal Ekleme - Başlangıç
    public function adminAddKurumsal()
    {
        $diller=siteLanguage::all();
        return view('admin.kurumsal.addkurumsal',['diller'=>$diller]);
    }
    //Admin Kurumsal Ekleme - Bitiş

    //Admin Kurumsal Ekleme Post - Başlangıç
    public function adminAddKurumsalPost(Request $request)
    {
        $input=$request->except('_token');
        //dd($input);
        if (!isset($input['sira'])){
            //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
            $input['sira']=1;
        }
        //Sayfa İmage Kaydetme
        if ($request->image){
            $imageName = 'kurumsal'.time().'.'.$request->image->extension();
            // Public Folder
            $upload=$request->image->move(public_path('uploadimage/kurumsal'), $imageName);
            $dbname='uploadimage/kurumsal/'.$imageName;
            $input['image']=$dbname;
        }else{
            $input['image']="";
        }

        $toplam=count($input['dil']);
        for ($i=0;$i<$toplam;$i++){
            $kaydet=DB::table('site_kurumsals')->insert([
                'kurumsalid' => $input['kurumsalid'],
                'sayfaturu' => $input['sayfaturu'],
                'baslik' => $input['baslik'][$i],
                'kisaaciklama' => $input['kisaaciklama'][$i],
                'icerik' => $input['icerik'][$i],
                'seobaslik' => $input['seobaslik'][$i],
                'seoaciklama' => $input['seoaciklama'][$i],
                'sira' => $input['sira'],
                'dil' => $input['dil'][$i],
                'diletiket' => $input['diletiket'][$i],
                'seourl' => fHelper::seoUrl($input['baslik'][$i]),
                'durum' => $input['durum'],
                'image' => $input['image']
            ]);
        }
        if ($kaydet){
            return redirect()->route('adminKurumsalList')->with('basarimesaji','Kurumsal sayfa başarıyla kayıt edildi.');
        }else{
            return redirect()->route('adminKurumsalList')->with('hatamesaji','Kurumsal sayfa eklenirken bir hata ile karşılaşıldı.');
        }
    }
    //Admin Kurumsal Ekleme Post - Bitiş

    //Admin Kurumsal Düzenleme - Başlangıç
    public function adminKurumsalEdit($kurumsalid)
    {
        $c=siteKurumsal::where('kurumsalid','=',$kurumsalid)->count();
        if(!$c==0){
            $diller=siteLanguage::all();
            $data=siteKurumsal::where('kurumsalid','=',$kurumsalid)->get();
            return view('admin.kurumsal.editkurumsal',['data'=>$data],['diller'=>$diller]);
        }
    }
    //Admin Kurumsal Düzenleme - Bitiş

    //Admin Kurumsal Düzenleme Post - Başlangıç
    public function adminKurumsalEditPost(Request $request)
    {
        $input=$request->except('_token');
        $c=siteKurumsal::where('id','=',$input['id'])->count();
        if(!$c==0){
            if (!isset($input['sira']) or $input['sira']==null){
                //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
                $input['sira']=1;
            }
            //Eğer yeni görsel gelmediyse eski görsel kalıyor.
            if(!isset($input['image'])){
                $input['image']=$input['oldimage'];
                unset($input['oldimage']);
            }else{
                File::delete($input['oldimage']);
                unset($input['oldimage']);
                //Slider İmage Kaydetme
                $imageName = 'kurumsal'.time().'.'.$input['image']->extension();
                // Public Folder
                $upload=$request->image->move(public_path('uploadimage/kurumsal'), $imageName);
                $dbname='uploadimage/kurumsal/'.$imageName;
                $input['image']=$dbname;
            }

            if(isset($input['durum']) and $input['durum']=="on"){
                $input['durum']=1;
            }else{
                $input['durum']=2;
            }

            $toplam=count($input['dil']);
            for ($i=0;$i<$toplam;$i++){
                $guncelle=DB::table('site_kurumsals')
                    ->where('id','=',$input['id'][$i])
                    ->update([
                        'sayfaturu' => $input['sayfaturu'],
                        'baslik' => $input['baslik'][$i],
                        'kisaaciklama' => $input['kisaaciklama'][$i],
                        'icerik' => $input['icerik'][$i],
                        'image' => $input['image'],
                        'seobaslik' => $input['seobaslik'][$i],
                        'seoaciklama' => $input['seoaciklama'][$i],
                        'sira' => $input['sira'],
                        'durum' => $input['durum'],
                        'dil' => $input['dil'][$i],
                        'diletiket' => $input['diletiket'][$i],
                        'seourl' => fHelper::seoUrl($input['baslik'][$i])
                    ]);
            }

            return redirect()->route('adminKurumsalList')->with('basarimesaji','Kurumsal sayfa güncellemesi başarıyla gerçekleşti.');
        }else{
            return redirect()->route('adminKurumsalList')->with('hatamesai','Kurumsal sayfa güncellenirken bir hata oluştu.');
        }
    }
    //Admin Kurumsal Düzenleme Post - Bitiş

    //Admin Kurumsal sayfasından JS ile durum aktifleştirme - Başlangıç
    function adminKurumsaldurumEdit($kurumsalid)
    {
        $c=siteKurumsal::where('kurumsalid','=',$kurumsalid)->count();
        if(!$c==0){
            $data=siteKurumsal::where('kurumsalid','=',$kurumsalid)->get();
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                if ($data[$i]['durum']==1){
                    //Sayfa açık ise kapatıyoruz
                    $guncelle=siteKurumsal::where('id','=',$data[$i]['id'])->update(['durum'=>2]);
                }else{
                    //Sayfa kapalı ise açıyoruz
                    $guncelle=siteKurumsal::where('id','=',$data[$i]['id'])->update(['durum'=>1]);
                }
            }
            return redirect()->route('adminKurumsalList')->with('basarimesaji','Kurumsal durum güncellemesi başarılı.');
        }else{
            return redirect()->route('adminKurumsalList')->with('hatamesaji','Kurumsal durum güncellerken hata oluştu.');
        }
    }
    //Admin Kurumsal sayfasından JS ile durum aktifleştirme - Bitiş

    //Admin Kurumsal sayfasından JS ile dil aktifleştirme - Başlangıç
    function adminKurumsalDel($kurumsalid)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=siteKurumsal::where('kurumsalid','=',$kurumsalid)->count();
        if(!$c==0){
            $data=siteKurumsal::where('kurumsalid','=',$kurumsalid)->get();
            File::delete($data[0]['image']);
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                $sil=siteKurumsal::where('id','=',$data[$i]['id'])->delete();
            }
            return redirect()->route('adminKurumsalList')->with('basarimesaji','Kurumsal sayfa başarıyla silindi.');
        }else{
            return redirect()->route('adminKurumsalList')->with('hatamesaji','Kurumsal sayfa silinirken hata oluştu.');
        }
    }
    //Admin Kurumsal sayfasından JS ile dil aktifleştirme - Bitiş



}
