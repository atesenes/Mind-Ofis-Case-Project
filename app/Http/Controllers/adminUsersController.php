<?php

namespace App\Http\Controllers;

use App\Models\site_user_information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class adminUsersController extends Controller
{
    //Admin Kullanıcı Listeleme - Başlangıç
    public function adminUsersList()
    {
        //Herhangi bir dilin olup olmadığını kontrol ediyoruz.
        $c=user::count();
        if(!$c==0){
            //Daha önceden bir dil eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=user::all();
            return view('admin.users.userslist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.users.userslist',['data'=>0]);
        }
    }
    //Admin Kullanıcı Listeleme - Bitiş

    //Pasaport onayından geçmemiş kullanıcılar
    public function adminUsersOnaysizList()
    {
        $c=site_user_information::count();
        if(!$c==0){
            //Daha önceden bir dil eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=site_user_information::where('passport_onay','=',1)->get();
            return view('admin.users.onaysizuserslist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.users.onaysizuserslist',['data'=>0]);
        }
    }
    //Pasaport onayından geçmemiş kullanıcılar

    //Pasaport Onay
    public function adminPassportOnay($userid)
    {
        $c=site_user_information::where('userid','=',$userid)->count();
        if (!$c==0){
            site_user_information::where('userid','=',$userid)->update(['passport_onay'=>2]);
            return redirect()->route('adminUsersOnaysizList')->with('basarimesaji','Pasaport onayı başarıyla gerçekleşti.');
        }
        return redirect()->route('adminUsersOnaysizList')->with('hatamesaji','Pasaport onaylanırken bir hata ile karşılaşıldı.');
    }
    //Pasaport Onay

    //Pasaport Ret
    public function adminPassportRet($userid)
    {
        $c=site_user_information::where('userid','=',$userid)->count();
        if (!$c==0){
            $data=site_user_information::where('userid','=',$userid)->first();
            site_user_information::where('userid','=',$userid)->update(['passport_onay'=>0,'passport_front'=>"",'passport_back'=>""]);
            return redirect()->route('adminUsersOnaysizList')->with('basarimesaji','Pasaport onayı başarıyla gerçekleşti.');
        }
        return redirect()->route('adminUsersOnaysizList')->with('hatamesaji','Pasaport onaylanırken bir hata ile karşılaşıldı.');
    }
    //Pasaport Ret

    //Admin Kullanıcı Ekleme - Başlangıç
    public function adminAddUsers()
    {
        return view('admin.users.adduser');
    }
    //Admin Kullanıcı Ekleme - Bitiş

    //Admin Kullanıcı Ekleme Post - Başlangıç
    public function adminAddUsersPost(Request $request)
    {
        $input=$request->except('_token');
        $input['password']=md5($input['password']);
        $c=user::where('email','=',$input['email'])->count();
        if ($c==0){
            user::create($input);
            return redirect()->route('adminUsersList')->with('basarimesaji','Yeni kullanıcı başarıyla eklendi.');
        }else{
            return redirect()->route('adminUsersList')->with('hatamesaji','Eklemeye çalıştığınız kullanıcı zaten kayıtlı.');
        }
    }
    //Admin Kullanıcı Ekleme Post - Bitiş

    //Admin Kullanıcı Düzenleme - Başlangıç
    public function adminUserEdit($id)
    {
        $c=user::where('id','=',$id)->count();
        if (!$c==0){
            $data=user::where('id','=',$id)->first();
            return view('admin.users.useredit',['data'=>$data]);
        }
        return redirect()->route('adminUsersList')->with('hatamesaji','Böyle bir kullanıcı bulunamadı.');
    }
    //Admin Kullanıcı Düzenleme - Bitiş

    //Admin Kullanıcı Güncelleme - Başlangıç
    public function adminUserEditPost(Request $request)
    {
        $input=$request->except('_token');
        //Parola boş ise veritabanına göndermiyoruz.
        if (empty($input['password'])){
            unset($input['password']);
        }else{
            $input['password']=md5($input['password']);
        }
        $c=user::where('id','=',$input['id'])->count();
        if(!$c==0){
            user::where('id','=',$input['id'])->update($input);
            return redirect()->route('adminUsersList')->with('basarimesaji','Kullanıcı güncellemesi başarılı.');
        }else{
            return redirect()->route('adminUsersList')->with('hatamesaji','Kullanıcı güncellenirken bir hata oluştu.');
        }
    }
    //Admin Kullanıcı Güncelleme - Bitiş

    //Admin Kullanıcı Silme - Başlangıç
    public function adminUserDel($id)
    {
        $c=user::where('id','=',$id)->count();
        if(!$c==0){
            user::where('id','=',$id)->delete();
            return redirect()->route('adminUsersList')->with('basarimesaji','Kullanıcı başarıyla silindi.');
        }else{
            return redirect()->route('adminUsersList')->with('hatamesaji','Kullanıcı silinirken bir hata oluştu.');
        }
    }
    //Admin Kullanıcı Silme - Bitiş

}
