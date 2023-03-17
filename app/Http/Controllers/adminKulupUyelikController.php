<?php

namespace App\Http\Controllers;

use App\Models\siteKulupUyelikleri;
use Illuminate\Http\Request;

class adminKulupUyelikController extends Controller
{
    public function adminUyelikKategorisiList()
    {
        //Herhangi bir slider olup olmadığını kontrol ediyoruz.
        $c=siteKulupUyelikleri::count();
        if(!$c==0){
            //Daha önceden bir slider eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteKulupUyelikleri::orderBy('kulupismi','ASC')->get();
            return view('admin.uyelikkategorisi.uyelikkategorisilist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.uyelikkategorisi.uyelikkategorisilist',['data'=>0]);
        }
    }

    public function adminUyelikKategorisiAdd()
    {
        return view('admin.uyelikkategorisi.adduyelikkategorisi');
    }

    public function adminUyelikKategorisiAddPost(Request $request)
    {
        $input=$request->except('_token');
        $kaydet=siteKulupUyelikleri::create($input);
        if ($kaydet){
            return redirect()->route('adminUyelikKategorisiList')->with('basarimesaji','Üye Kategorisi başarıyla eklenmiştir.');
        }
        return redirect()->route('adminUyelikKategorisiList')->with('hatamesaji','Üye Kategorisi eklenirken bir hata ile karşılaşıldı.');
    }

    public function adminUyelikKategorisiEdit($id)
    {
        $c=siteKulupUyelikleri::where('id','=',$id)->count();
        if (!$c==0){
            $data=siteKulupUyelikleri::where('id','=',$id)->first();
            return view('admin.uyelikkategorisi.edituyelikkategorisi',['data'=>$data]);
        }
    }

    public function adminUyelikKategorisiEditPost(Request $request)
    {
        $input=$request->except('_token');
        $c=siteKulupUyelikleri::where('id','=',$input['id'])->count();
        if (!$c==0){
            $update=siteKulupUyelikleri::where('id','=',$input['id'])->update($input);
            if ($update){
                return redirect()->back()->with('basarimesaji','Üye Kulübü başarıyla güncellendi.');
            }
            return redirect()->back()->with('hatamesaji','Üye kulübü güncellenirken bir hata ile karşılaşıldı.');
        }
    }

    //Admin Markalar sayfasından JS ile durum aktifleştirme
    function adminUyelikKategoriDurumEdit($id)
    {
        $c=siteKulupUyelikleri::where('id','=',$id)->count();
        if(!$c==0){
            $data=siteKulupUyelikleri::where('id','=',$id)->first();
            if ($data['durum']==1){
                //Sayfa açık ise kapatıyoruz
                $guncelle=siteKulupUyelikleri::where('id','=',$data['id'])->update(['durum'=>0]);
            }else{
                //Sayfa kapalı ise açıyoruz
                $guncelle=siteKulupUyelikleri::where('id','=',$data['id'])->update(['durum'=>1]);
            }
            return redirect()->back()->with('basarimesaji','Üye Kategori durum güncellemesi başarılı.');
        }else{
            return redirect()->back()->with('hatamesaji','Üye Kategori durum güncellerken hata oluştu.');
        }
    }

    public function adminUyelikKategorisiDel($id)
    {
        $c=siteKulupUyelikleri::where('id','=',$id)->count();
        if(!$c==0){
            $delete=siteKulupUyelikleri::where('id','=',$id)->delete();
            if ($delete){
                return redirect()->route('adminUyelikKategorisiList')->with('basarimesaji','Üye Kategorisi başarıyla silinmiştir.');
            }
            return redirect()->route('adminUyelikKategorisiList')->with('hatamesaji','Üye Kategorisi silinirken hata oluştu.');
        }
        return redirect()->route('adminUyelikKategorisiList')->with('hatamesaji','Üye Kategorisi silinirken hata oluştu.');
    }






}
