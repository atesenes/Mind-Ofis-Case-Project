<?php

namespace App\Http\Controllers;

use App\Models\borsaBasvurular;
use App\Models\siteBorsaBakiyeler;
use App\Models\siteBorsaIslemleri;
use App\Models\siteKiralama;
use Illuminate\Http\Request;

class adminKiralamaController extends Controller
{
    public function adminKiralamaList()
    {
        //Herhangi bir kiralama olup olmadığını kontrol ediyoruz.
        $c=siteBorsaIslemleri::count();
        if(!$c==0){
            //Daha önceden bir kiralama eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteBorsaIslemleri::all();
            return view('admin.kiralama.kiralamalist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.kiralama.kiralamalist',['data'=>0]);
        }
    }
    public function adminInvestNew()
    {
        //Herhangi bir kiralama olup olmadığını kontrol ediyoruz.
        $c=siteBorsaIslemleri::where('durum','=',0)->count();
        if(!$c==0){
            //Daha önceden bir kiralama eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteBorsaIslemleri::where('durum','=',0)->get();
            return view('admin.kiralama.kiralamalist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.kiralama.kiralamalist',['data'=>0]);
        }
    }
    public function adminInvestProcess()
    {
        //Herhangi bir kiralama olup olmadığını kontrol ediyoruz.
        $c=siteBorsaIslemleri::where('durum','=',1)->count();
        if(!$c==0){
            //Daha önceden bir kiralama eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteBorsaIslemleri::where('durum','=',1)->get();
            return view('admin.kiralama.kiralamalist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.kiralama.kiralamalist',['data'=>0]);
        }
    }
    public function adminInvestComplated()
    {
        //Herhangi bir kiralama olup olmadığını kontrol ediyoruz.
        $c=siteBorsaIslemleri::where('durum','=',2)->count();
        if(!$c==0){
            //Daha önceden bir kiralama eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteBorsaIslemleri::where('durum','=',2)->get();
            return view('admin.kiralama.kiralamalist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.kiralama.kiralamalist',['data'=>0]);
        }
    }

    public function adminKiralamaDetay($id)
    {
        $c=siteBorsaIslemleri::where('id','=',$id)->count();
        if (!$c==0){
            $data=siteBorsaIslemleri::where('id','=',$id)->first();
            return view('admin.kiralama.borsaislemdetay',['data'=>$data]);
        }
        return redirect()->back()->with('hatamesaji','Detaya listelenirken bir hata ile karşılaşıldı.');
    }

    public function adminDurumDegis($id,$durum)
    {
        $c=siteBorsaIslemleri::where('id','=',$id)->count();
        if (!$c==0){
            siteBorsaIslemleri::where('id','=',$id)->update(['durum'=>$durum]);
            if ($durum==2){
                $islem=siteBorsaIslemleri::where('id','=',$id)->first();
                siteBorsaBakiyeler::where('isinno','=',$islem->isinno)->update(['durum'=>1]);
            }
            return redirect()->route('adminInvestNew')->with('basarimesaji','Durum güncellemesi başarıyla tamamlandı.');
        }
        return redirect()->back()->with('hatamesaji','Durum güncellenirken bir hata ile karşılaşıldı.');
    }

    public function adminKiralamaSil($id)
    {
        $c=siteBorsaIslemleri::where('id','=',$id)->count();
        if (!$c==0){
            $delete=siteBorsaIslemleri::where('id','=',$id)->delete();
            return redirect()->back()->with('basarimesaji','Başvuru başarıyla silindi.');
        }
        return redirect()->back()->with('hatamesaji','Başvuru silinirken bir hata ile karşılaşıldı.');
    }
}
