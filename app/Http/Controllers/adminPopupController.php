<?php

namespace App\Http\Controllers;

use App\Models\sitePopup;
use Illuminate\Http\Request;

class adminPopupController extends Controller
{
    public function adminPopupList()
    {
        //Herhangi bir slider olup olmadığını kontrol ediyoruz.
        $c=sitePopup::count();
        if(!$c==0){
            //Daha önceden bir slider eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=sitePopup::all();
            return view('admin.popup.popuplist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.popup.popuplist',['data'=>0]);
        }
    }

    //Popup Ekleme
    public function adminAddPopup()
    {
        return view('admin.popup.addpopup');
    }
}
