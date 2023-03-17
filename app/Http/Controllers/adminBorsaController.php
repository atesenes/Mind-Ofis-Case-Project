<?php

namespace App\Http\Controllers;

use App\Http\Helper\fHelper;
use App\Models\siteLanguage;
use App\Models\veriler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminBorsaController extends Controller
{
    public function adminBorsaList()
    {
        $c=veriler::count();
        if (!$c==0){
            $data=veriler::all();
            return view('admin.borsa.borsalist',['data'=>$data]);
        }else{
            return view('admin.borsa.borsalist',['data'=>0]);
        }
    }

    public function adminAddBorsa()
    {
        $diller=siteLanguage::all();
        return view('admin.borsa.addborsa',['diller'=>$diller]);
    }

    public function adminAddBorsaPost(Request $request)
    {
        $input=$request->except('_token');
        $kaydet=veriler::create($input);
        if ($kaydet){
            return redirect()->route('adminBorsaList')->with('basarimesaji','Veri başarıyla kayıt edildi.');
        }else{
            return redirect()->route('adminBorsaList')->with('hatamesaji','Veri eklenirken bir hata ile karşılaşıldı.');
        }
    }

    public function adminEditBorsa($veriid)
    {
        $c=veriler::where('id','=',$veriid)->count();
        if(!$c==0){
            $diller=siteLanguage::all();
            $data=veriler::where('id','=',$veriid)->get();
            return view('admin.borsa.editborsa',['data'=>$data],['diller'=>$diller]);
        }
    }

    public function adminEditBorsaPost(Request $request)
    {
        $input=$request->except('_token');
        if (!isset($input['durum'])){
            $input['durum']=0;
        }else{
            $input['durum']=1;
        }

        $update=veriler::where('id','=',$input['id'])->update($input);
        if ($update){
            return redirect()->route('adminBorsaList')->with('basarimesaji','Veri güncellemesi başarıyla gerçekleşti.');
        }
        return redirect()->route('adminBorsaList')->with('hatamesaji','Veri güncellenirken bir hata ile karşılaşıldı.');
    }

    function adminBorsadurumEdit($id)
    {
        $c=veriler::where('id','=',$id)->count();
        if(!$c==0){
            $data=veriler::where('id','=',$id)->first();
            if ($data->durum==0){
                veriler::where('id','=',$id)->update(['durum'=>1]);
            }else{
                veriler::where('id','=',$id)->update(['durum'=>0]);
            }
            return redirect()->route('adminBorsaList')->with('basarimesaji','Veri durum güncellemesi başarılı.');
        }else{
            return redirect()->route('adminBorsaList')->with('hatamesaji','Veri durum güncellerken hata oluştu.');
        }
    }

    public function adminBorsaDel($id)
    {
        $c=veriler::where('id','=',$id)->count();
        if(!$c==0){
            veriler::where('id','=',$id)->delete();
            return redirect()->route('adminBorsaList')->with('basarimesaji','Veri başarıyla silindi.');
        }else{
            return redirect()->route('adminBorsaList')->with('hatamesaji','Veri silinirken hata oluştu.');
        }
    }
}
