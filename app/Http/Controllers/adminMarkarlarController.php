<?php

namespace App\Http\Controllers;

use App\Models\siteMarkalar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class adminMarkarlarController extends Controller
{
    public function adminMarkalarList()
    {
        //Herhangi bir slider olup olmadığını kontrol ediyoruz.
        $c=siteMarkalar::count();
        if(!$c==0){
            //Daha önceden bir slider eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteMarkalar::all();
            return view('admin.markalar.markalarlist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.markalar.markalarlist',['data'=>0]);
        }
    }

    //Marka Ekleme
    public function adminAddMarka()
    {
        return view('admin.markalar.addmarka');
    }

    //Marka Ekleme Postu
    public function adminAddMarkaPost(Request $request)
    {
        $input=$request->except('_token');
        //dd($input);
        //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
        if (!isset($input['sira'])){
            $input['sira']=1;
        }
        //Sayfa İmage Kaydetme
        if ($request->image){
            $imageName = 'markalar'.time().'.'.$request->image->extension();
            // Public Folder
            $upload=$request->image->move(public_path('uploadimage/markalar'), $imageName);
            $dbname='uploadimage/markalar/'.$imageName;
            $input['image']=$dbname;
        }else{
            $input['image']="";
        }
        $kaydet=siteMarkalar::create($input);
        if ($kaydet){
            return redirect()->route('adminMarkalarList')->with('basarimesaji','Marka başarıyla kayıt edildi.');
        }else{
            return redirect()->route('adminMarkalarList')->with('hatamesaji','Marka eklenirken bir hata ile karşılaşıldı.');
        }
    }

    //Marka Edit
    public function adminEditMarka($id=null)
    {
        //Gelen ID olup olmadığının kontrolü
        if ($id==null){
            return redirect()->back()->with('hatamesaji','ID gönderilirken bir sorun oluştu.');
        }
        $data=siteMarkalar::where('id','=',$id)->first();
        return view('admin.markalar.editmarka',['data'=>$data]);
    }

    //Marka Edit Post
    public function adminEditMarkaPost(Request $request)
    {
        $input=$request->except('_token');
        //dd($input);
        $c=siteMarkalar::where('id','=',$input['id'])->count();
        if (!$c==0){
            if (!isset($input['sira']) or $input['sira']==null){
                //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
                $input['sira']=1;
            }
        }
        //Eğer yeni görsel gelmediyse eski görsel kalıyor.
        if(!isset($input['image'])){
            $input['image']=$input['oldimage'];
            unset($input['oldimage']);
        }else{
            File::delete($input['oldimage']);
            unset($input['oldimage']);
            //Slider İmage Kaydetme
            $imageName = 'markalar'.time().'.'.$input['image']->extension();
            // Public Folder
            $upload=$request->image->move(public_path('uploadimage/markalar'), $imageName);
            $dbname='uploadimage/markalar/'.$imageName;
            $input['image']=$dbname;
        }
        //Durum Kontrolü
        if(isset($input['durum']) and $input['durum']=="on"){
            $input['durum']=1;
        }else{
            $input['durum']=2;
        }
        $update=siteMarkalar::where('id','=',$input['id'])->update($input);
        if ($update){
            return redirect()->back()->with('basarimesaji','Marka güncellemesi başarılı.');
        }
        return redirect()->back()->with('hatamesaji','Marka güncellerken bir sorunla karşılaşıldı.');
    }

    //Admin Markalar sayfasından JS ile durum aktifleştirme
    function adminMarkaDurumEdit($id)
    {
        $c=siteMarkalar::where('id','=',$id)->count();
        if(!$c==0){
            $data=siteMarkalar::where('id','=',$id)->first();
            if ($data['durum']==1){
                //Sayfa açık ise kapatıyoruz
                $guncelle=siteMarkalar::where('id','=',$data['id'])->update(['durum'=>0]);
            }else{
                //Sayfa kapalı ise açıyoruz
                $guncelle=siteMarkalar::where('id','=',$data['id'])->update(['durum'=>1]);
            }
            return redirect()->back()->with('basarimesaji','Marka durum güncellemesi başarılı.');
        }else{
            return redirect()->back()->with('hatamesaji','Marka durum güncellerken hata oluştu.');
        }
    }

    //Admin Marka sayfa Silme - Başlangıç
    function adminMarkaDel($id)
    {
        $c=siteMarkalar::where('id','=',$id)->count();
        if(!$c==0){
            $data=siteMarkalar::where('id','=',$id)->first();
            File::delete($data['image']);
            $sil=siteMarkalar::where('id','=',$data['id'])->delete();
            return redirect()->back()->with('basarimesaji','Marka başarıyla silindi.');
        }else{
            return redirect()->back()->with('hatamesaji','Marka silinirken hata oluştu.');
        }
    }
}
