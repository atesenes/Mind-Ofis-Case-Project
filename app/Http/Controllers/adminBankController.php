<?php

namespace App\Http\Controllers;

use App\Models\siteBankAccounts;
use Illuminate\Http\Request;

class adminBankController extends Controller
{
    public function adminBankaList()
    {
        //Herhangi bir dilin olup olmadığını kontrol ediyoruz.
        $c=siteBankAccounts::count();
        if(!$c==0){
            //Daha önceden bir dil eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteBankAccounts::all();
            return view('admin.banks.banklist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.banks.banklist',['data'=>0]);
        }
    }

    public function adminAddBanka()
    {
        return view('admin.banks.addbank');
    }

    public function adminAddBankaPost(Request $request)
    {
        $input=$request->except('_token');
        $kaydet=siteBankAccounts::create($input);
        if ($kaydet){
            return redirect()->route('adminBankaList')->with('basarimesaji','Yeni banka başarıyla eklenmiştir.');
        }
        return redirect()->route('adminBankaList')->with('hatamesaji','Yeni banka eklenirken bir hata ile karşılaşıldı.');
    }

    public function adminBankDel($id)
    {
        $c=siteBankAccounts::where('id','=',$id)->count();
        if (!$c==0){
            siteBankAccounts::where('id','=',$id)->delete();
            return redirect()->route('adminBankaList')->with('basarimesaji','Banka başarıyla silinmiştir.');
        }
        return redirect()->route('adminBankaList')->with('hatamesaji','Banka silinirken bir hata ile karşılaşıldı.');
    }

    public function adminBankDurumDegis($id)
    {
        $c=siteBankAccounts::where('id','=',$id)->count();
        if(!$c==0){
            $data=siteBankAccounts::where('id','=',$id)->first();
            if ($data->durum==1){
                //Sayfa açık ise kapatıyoruz
                $guncelle=siteBankAccounts::where('id','=',$data->id)->update(['durum'=>0]);
            }else{
                //Sayfa kapalı ise açıyoruz
                $guncelle=siteBankAccounts::where('id','=',$data->id)->update(['durum'=>1]);
            }
            return redirect()->route('adminBankaList')->with('basarimesaji','Ürün durum güncellemesi başarılı.');
        }else{
            return redirect()->route('adminBankaList')->with('hatamesaji','Ürün durum güncellerken hata oluştu.');
        }
    }
}
