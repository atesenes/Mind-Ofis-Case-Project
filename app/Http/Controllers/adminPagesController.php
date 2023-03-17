<?php

namespace App\Http\Controllers;

use App\Http\Helper\fHelper;
use App\Models\siteLanguage;
use App\Models\sitePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class adminPagesController extends Controller
{
    public function adminPagesList()
    {
        //Herhangi bir slider olup olmadığını kontrol ediyoruz.
        $c=sitePages::count();
        if(!$c==0){
            //Daha önceden bir slider eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=sitePages::where('diletiket','=','tr')->get();
            return view('admin.pages.pageslist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.pages.pageslist',['data'=>0]);
        }
    }

    //Admin Sayfa Ekleme - Başlangıç
    public function adminAddPages()
    {
        $diller=siteLanguage::all();
        return view('admin.pages.addpages',['diller'=>$diller]);
    }
    //Admin Sayfa Ekleme - Bitiş

    //Admin Sayfa Ekleme Post - Başlangıç
    public function adminAddPagesPost(Request $request)
    {
        $input=$request->except('_token');
        if (!isset($input['sira'])){
            //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
            $input['sira']=1;
        }
        //Sayfa İmage Kaydetme
        if ($request->image){
            $imageName = 'pages'.time().'.'.$request->image->extension();
            // Public Folder
            $upload=$request->image->move(public_path('uploadimage/pages'), $imageName);
            $dbname='uploadimage/pages/'.$imageName;
            $input['image']=$dbname;
        }else{
            $input['image']="";
        }

        $toplam=count($input['dil']);
        for ($i=0;$i<$toplam;$i++){
            $kaydet=DB::table('site_pages')->insert([
                'pagesid' => $input['pagesid'],
                'baslik' => $input['baslik'][$i],
                'kisaaciklama' => $input['kisaaciklama'][$i],
                'icerik' => $input['icerik'][$i],
                'seobaslik' => $input['seobaslik'][$i],
                'seoaciklama' => $input['seoaciklama'][$i],
                'sira' => $input['sira'],
                'dil' => $input['dil'][$i],
                'diletiket' => $input['diletiket'][$i],
                'diletiket' => $input['diletiket'][$i],
                'seourl' => fHelper::seoUrl($input['baslik'][$i]),
                'durum' => $input['durum'],
                'image' => $input['image']
            ]);
        }
        if ($kaydet){
            return redirect()->route('adminPagesList')->with('basarimesaji','Sayfa başarıyla kayıt edildi.');
        }else{
            return redirect()->route('adminPagesList')->with('hatamesaji','Sayfa eklenirken bir hata ile karşılaşıldı.');
        }
    }
    //Admin Sayfa Ekleme Post - Bitiş

    //Admin Sayfa Düzenleme - Başlangıç
    public function adminPagesEdit($pagesid)
    {
        $c=sitePages::where('pagesid','=',$pagesid)->count();
        if(!$c==0){
            $diller=siteLanguage::all();
            $data=sitePages::where('pagesid','=',$pagesid)->get();
            return view('admin.pages.editpages',['data'=>$data],['diller'=>$diller]);
        }
    }
    //Admin Sayfa Düzenleme - Bitiş

    //Admin Sayfa Düzenleme Post - Başlangıç
    public function adminPagesEditPost(Request $request)
    {
        $input=$request->except('_token');
        $c=sitePages::where('id','=',$input['id'])->count();
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
                $imageName = 'pages'.time().'.'.$input['image']->extension();
                // Public Folder
                $upload=$request->image->move(public_path('uploadimage/pages'), $imageName);
                $dbname='uploadimage/pages/'.$imageName;
                $input['image']=$dbname;
            }

            if(isset($input['durum']) and $input['durum']=="on"){
                $input['durum']=1;
            }else{
                $input['durum']=2;
            }

            $toplam=count($input['dil']);
            for ($i=0;$i<$toplam;$i++){
                $guncelle=DB::table('site_pages')
                    ->where('id','=',$input['id'][$i])
                    ->update([
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

            return redirect()->route('adminPagesList')->with('basarimesaji','Sayfa güncellemesi başarıyla gerçekleşti.');
        }else{
            return redirect()->route('adminPagesList')->with('hatamesai','Sayfa güncellenirken bir hata oluştu.');
        }
    }
    //Admin Sayfa Düzenleme Post - Bitiş

    //Admin Pages sayfasından JS ile durum değiştirme - Başlangıç
    function adminPagesdurumEdit($pagesid)
    {
        $c=sitePages::where('pagesid','=',$pagesid)->count();
        if(!$c==0){
            $data=sitePages::where('pagesid','=',$pagesid)->get();
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                if ($data[$i]['durum']==1){
                    //Sayfa açık ise kapatıyoruz
                    $guncelle=sitePages::where('id','=',$data[$i]['id'])->update(['durum'=>2]);
                }else{
                    //Sayfa kapalı ise açıyoruz
                    $guncelle=sitePages::where('id','=',$data[$i]['id'])->update(['durum'=>1]);
                }
            }
            return redirect()->route('adminPagesList')->with('basarimesaji','Sayfa durum güncellemesi başarılı.');
        }else{
            return redirect()->route('adminPagesList')->with('hatamesaji','Sayfa durum güncellerken hata oluştu.');
        }
    }
    //Admin Pages sayfasından JS ile durum değiştirme - Bitiş

    //Admin Kurumsal sayfa Silme - Başlangıç
    function adminPagesDel($pagesid)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=sitePages::where('pagesid','=',$pagesid)->count();
        if(!$c==0){
            $data=sitePages::where('pagesid','=',$pagesid)->get();
            File::delete($data[0]['image']);
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                $sil=sitePages::where('id','=',$data[$i]['id'])->delete();
            }
            return redirect()->route('adminPagesList')->with('basarimesaji','Sayfa başarıyla silindi.');
        }else{
            return redirect()->route('adminPagesList')->with('hatamesaji','Sayfa silinirken hata oluştu.');
        }
    }
    //Admin Kurumsal sayfa Silme - Bitiş

}
