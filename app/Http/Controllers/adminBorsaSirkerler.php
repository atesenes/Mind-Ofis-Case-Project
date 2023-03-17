<?php

namespace App\Http\Controllers;

use App\Models\siteBorsaSirketler;
use App\Models\siteLanguage;
use Illuminate\Http\Request;

class adminBorsaSirkerler extends Controller
{
    public function adminSirketList()
    {
        $c=siteBorsaSirketler::count();
        if (!$c==0){
            $data=siteBorsaSirketler::all();
            return view('admin.borsaSirketler.sirketlerlist',['data'=>$data]);
        }else{
            return view('admin.borsaSirketler.sirketlerlist',['data'=>0]);
        }
    }
    public function adminSirketAdd()
    {
        $diller=siteLanguage::all();
        return view('admin.borsaSirketler.addsirket',['diller'=>$diller]);
    }
    public function adminSirketAddPost(Request $request)
    {
        $input=$request->except('_token');
        $kaydet=siteBorsaSirketler::create($input);
        return redirect()->route('adminSirketList')->with('basarimesaji','Şirket başarıyla kayıt edildi.');
    }
    public function adminSirketEdit($id)
    {
        $c=siteBorsaSirketler::where('id','=',$id)->count();
        if(!$c==0){
            $diller=siteLanguage::all();
            $data=siteBorsaSirketler::where('id','=',$id)->get();
            return view('admin.borsaSirketler.editsirket',['data'=>$data],['diller'=>$diller]);
        }
    }
    public function adminSirketEditPost(Request $request)
    {
        $input=$request->except('_token');
        $id=$input['id'];
        unset($input['id']);
        $kaydet=siteBorsaSirketler::where('id','=',$id)->update($input);
        return redirect()->route('adminSirketList')->with('basarimesaji','Şirket başarıyla güncellendi.');
    }
    public function adminSirketDel($id)
    {
        $c=siteBorsaSirketler::where('id','=',$id)->count();
        if (!$c==0){
            siteBorsaSirketler::where('id','=',$id)->delete();
            return redirect()->route('adminSirketList')->with('basarimesaji','Şirket başarıyla silinmiştir.');
        }
    }
}
