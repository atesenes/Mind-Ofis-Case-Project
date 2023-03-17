<?php

namespace App\Http\Controllers;

use App\Http\Helper\fHelper;
use App\Models\siteCategoires;
use App\Models\siteLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class adminCategoriesController extends Controller
{
    public function adminCatsList()
    {
        //Herhangi bir slider olup olmadığını kontrol ediyoruz.
        $c=siteCategoires::count();
        if(!$c==0){
            $altkategoriler=siteCategoires::where([['topcatid','!=',null],['diletiket','=','tr']])->get();
            //Daha önceden bir slider eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteCategoires::where('diletiket','=','tr')->get();
            return view('admin.categories.categorieslist',['data'=>$data],['altkategoriler'=>$altkategoriler]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.categories.categorieslist',['data'=>0]);
        }
    }

    //Admin Kategori Ekleme - Başlangıç
    public function adminAddCat()
    {
        $diller=siteLanguage::all();
        $cats=siteCategoires::where('diletiket','=','tr')->get();
        return view('admin.categories.addcategori',['diller'=>$diller,'cats'=>$cats]);
    }
    //Admin Kategori Ekleme - Bitiş

    //Admin Kategori Ekleme Post - Başlangıç
    public function adminAddCatPost(Request $request)
    {
        $input=$request->except('_token');
        if (!isset($input['sira'])){
            //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
            $input['sira']=1;
        }
        //Kategori İmage Kaydetme
        if ($request->image){
            $imageName = 'cats'.time().'.'.$request->image->extension();
            // Public Folder
            $upload=$request->image->move(public_path('uploadimage/cats'), $imageName);
            $dbname='uploadimage/cats/'.$imageName;
            $input['image']=$dbname;
        }else{
            $input['image']="";
        }

        if (!isset($input['topcatid'])){
            $input['topcatid']="0";
        }

        $toplam=count($input['dil']);
        for ($i=0;$i<$toplam;$i++){
            $kaydet=DB::table('site_categoires')->insert([
                'catid' => $input['catid'],
                'topcatid'=>$input['topcatid'],
                'baslik' => $input['baslik'][$i],
                'kisaaciklama' => $input['kisaaciklama'][$i],
                'seobaslik' => $input['seobaslik'][$i],
                'seoaciklama' => $input['seoaciklama'][$i],
                'sira' => $input['sira'],
                'dil' => $input['dil'][$i],
                'diletiket' => $input['diletiket'][$i],
                'menudurum' => $input['menudurum'],
                'durum' => $input['durum'],
                'image' => $input['image'],
                'seourl' => fHelper::seoUrl($input['baslik'][$i])
            ]);
        }
        if ($kaydet){
            return redirect()->route('adminCatsList')->with('basarimesaji','Kategori başarıyla kayıt edildi.');
        }else{
            return redirect()->route('adminCatsList')->with('hatamesaji','Kategori eklenirken bir hata ile karşılaşıldı.');
        }
    }
    //Admin Kategori Ekleme Post - Bitiş

    //Admin Kategori Düzenleme - Başlangıç
    public function adminCatEdit($catid)
    {
        $c=siteCategoires::where('catid','=',$catid)->count();
        if(!$c==0){
            $anakategoriler=siteCategoires::where([['topcatid','=',null],['diletiket','=','tr']])->get();
            $diller=siteLanguage::all();
            $data=siteCategoires::where('catid','=',$catid)->get();
            $veri=array('data'=>$data,'diller'=>$diller,'anakategoriler'=>$anakategoriler);
            return view('admin.categories.editcategori',$veri);
        }
    }
    //Admin Kategori Düzenleme - Bitiş

    //Admin Sayfa Düzenleme Post - Başlangıç
    public function adminCatEditPost(Request $request)
    {
        $input=$request->except('_token');
        $c=siteCategoires::where('id','=',$input['id'])->count();
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
                $imageName = 'cats'.time().'.'.$input['image']->extension();
                // Public Folder
                $upload=$request->image->move(public_path('uploadimage/cats'), $imageName);
                $dbname='uploadimage/cats/'.$imageName;
                $input['image']=$dbname;
            }

            if(isset($input['menudurum']) and $input['menudurum']=="on"){
                $input['menudurum']=1;
            }else{
                $input['menudurum']=2;
            }

            if(isset($input['durum']) and $input['durum']=="on"){
                $input['durum']=1;
            }else{
                $input['durum']=2;
            }

            if(isset($input['topcatid']) and $input['topcatid']==null){
                $input['topcatid']=null;
            }


            $toplam=count($input['dil']);
            for ($i=0;$i<$toplam;$i++){
                $guncelle=DB::table('site_categoires')
                    ->where('id','=',$input['id'][$i])
                    ->update([
                        'catid' => $input['catid'],
                        'baslik' => $input['baslik'][$i],
                        'kisaaciklama' => $input['kisaaciklama'][$i],
                        'image' => $input['image'],
                        'seobaslik' => $input['seobaslik'][$i],
                        'seoaciklama' => $input['seoaciklama'][$i],
                        'sira' => $input['sira'],
                        'menudurum' => $input['menudurum'],
                        'durum' => $input['durum'],
                        'topcatid' => $input['topcatid'],
                        'dil' => $input['dil'][$i],
                        'diletiket' => $input['diletiket'][$i],
                        'seourl' => fHelper::seoUrl($input['baslik'][$i])
                    ]);
            }

            return redirect()->route('adminCatsList')->with('basarimesaji','Kategori güncellemesi başarıyla gerçekleşti.');
        }else{
            return redirect()->route('adminCatsList')->with('hatamesai','Kategori güncellenirken bir hata oluştu.');
        }
    }
    //Admin Sayfa Düzenleme Post - Bitiş

    //Admin Categori JS ile durum değiştirme - Başlangıç
    function adminCatdurumEdit($catid)
    {
        $c=siteCategoires::where('catid','=',$catid)->count();
        if(!$c==0){
            $data=siteCategoires::where('catid','=',$catid)->get();
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                if ($data[$i]['durum']==1){
                    //Sayfa açık ise kapatıyoruz
                    $guncelle=siteCategoires::where('id','=',$data[$i]['id'])->update(['durum'=>2]);
                }else{
                    //Sayfa kapalı ise açıyoruz
                    $guncelle=siteCategoires::where('id','=',$data[$i]['id'])->update(['durum'=>1]);
                }
            }
            return redirect()->route('adminCatsList')->with('basarimesaji','Kategori durum güncellemesi başarılı.');
        }else{
            return redirect()->route('adminCatsList')->with('hatamesaji','Kategori durum güncellerken hata oluştu.');
        }
    }
    //Admin Categori JS ile durum değiştirme - Bitiş

    //Admin Categori Silme - Başlangıç
    function adminCatDel($catid)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=siteCategoires::where('catid','=',$catid)->count();
        if(!$c==0){
            $data=siteCategoires::where('catid','=',$catid)->get();
            File::delete($data[0]['image']);
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                $sil=siteCategoires::where('id','=',$data[$i]['id'])->delete();
            }
            return redirect()->route('adminCatsList')->with('basarimesaji','Kategori başarıyla silindi.');
        }else{
            return redirect()->route('adminCatsList')->with('hatamesaji','Kategori silinirken hata oluştu.');
        }
    }
    //Admin Categori Silme - Bitiş
}
