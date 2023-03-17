<?php

namespace App\Http\Controllers;

use App\Models\siteBorsaIslemleri;
use App\Models\siteContant;
use App\Models\siteLanguage;
use App\Models\siteSettings;
use App\Models\siteSmtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminSetController extends Controller
{
    public function index()
    {
        //Herhangi bir kiralama olup olmadığını kontrol ediyoruz.
        $c=siteBorsaIslemleri::where('durum','=',0)->count();
        if(!$c==0){
            //Daha önceden bir kiralama eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteBorsaIslemleri::where('durum','=',0)->get();
            return view('admin.index',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.index',['data'=>0]);
        }
    }

    //Site ayarları görüntüleme başlangıç
    function adminSiteSettings()
    {
        if(siteSettings::where('id','=',1)->count()==1){
            //Veri tabanında girdi var ise sayfaya yönlendirip kayıtları ekrana yazdırıyoruz.
            $data=siteSettings::where('id','=',1)->first();
            return view('admin.settings.settings',['data'=>$data]);
        }else{
            //Veritabanında girdi yok ise anasayfaya geri yönlendiriyoruz.
            return redirect()->route('adminIndex');
        }
    }
    //Site ayarları görüntüleme başlangıç

    //Site ayarları güncelleme başlangıç
    function adminSiteSettingsUpdate(Request $request)
    {
        $all=$request->except('_token');
        //Veritabanında site ayarları tablosunun olup olmadığını kontrol ediyoruz.
        $c=siteSettings::where('id','=',1)->count();
        if (!$c==0){
            //Eğer kayıt var ise formdan gelen veriler ile güncellemesini sağlıyoruz.
            $update=siteSettings::where('id','=',1)->update($all);
            if ($update==1){
                //Güncelleme başarılı ise ayarlar sayfasına geri dönüp başarılı bildirimi veriyoruz.
                return redirect()->back()->with('basarimesaji','Site ayarları başarıyla güncellendi.');
            }else{
                //Güncellemede hata oluştuysa geri döndürüp hata mesajı verdiriyoruz.
                return redirect()->back()->with('hatamesaji','Site ayarlarını güncellerken bir hata meydana geldi.');
            }
        }
    }
    //Site ayarları güncelleme bitiş

    //Site Dil Ayarları Başlangıç
    function adminLangSettings()
    {
        //Herhangi bir dilin olup olmadığını kontrol ediyoruz.
        $c=siteLanguage::count();
        if(!$c==0){
            //Daha önceden bir dil eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteLanguage::all();
            return view('admin.settings.language',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.settings.language',['data'=>0]);
        }

    }
    //Site Dil Ayarları Bitiş

    //Site Dil Ekle
    function adminAddLangSettings()
    {
        return view('admin.settings.addlanguage');
    }
    //Site Dil Ekle

    //Site Dil EKle - Post Başlangıç
    function adminAddLangSettingsPost(Request $request)
    {
        //Formdan gelen verileri alıyoruz
        $input=$request->except('_token');
        //$c değişkenine veritabanında bu dilin olup olmadığını kontrol ettirip değer atıyoruz.
        $c=siteLanguage::where('diletiket','=',$input['diletiket'])->count();
        if ($c==0){
            //Eğer farklı bir varsayılan dil var ise onu kapatıp son seçileni aktifleştirir.
            if(isset($input['dilvarsayilan'])){
            $varsayilandiller=siteLanguage::where('dilvarsayilan','=','on')->get();
                foreach ($varsayilandiller as $varsayilanlar){
                    siteLanguage::where('id','=',$varsayilanlar['id'])->update(['dilvarsayilan'=>'off']);
                }
            }
            //Eğer $c 0 a eşitse veritabanına kaydını yaptırıyoruz
            siteLanguage::create($input)->save();
            return redirect()->route('adminLangSettings')->with('basarimesaji','Yeni dil başarıyla eklenmiştir.');
        }else{
            //Eğer $c 1 e eşitse veritabanında daha önce o dil etiketiyle kayıt yapılmış işlem yapılmadan geri gönderiyoruz.
            return redirect()->back()->with('hatamesaji','Bu dil daha öncesinden eklenmiştir.');
        }
    }
    //Site Dil EKle - Post Bitiş

    //Site Dil Edit - Başlangıç
    function adminLangEdit($id)
    {
        if(isset($id)){
            $data=siteLanguage::where('id','=',$id)->first();
            return view('admin.settings.editlanguage',['data'=>$data]);
        }
    }
    //Site Dil Edit - Bitiş

    //Site Dil Edit Post - Başlangıç
    function adminLangEditPost(Request $request)
    {
        $input=$request->except('_token');
        $c=siteLanguage::where('id','=',$input['id'])->count();
        //Eğer gönderilen id ile bir dil eşleşiyorsa güncellemeyi yapacak.
        if(!$c==0){
            //Eğer farklı bir varsayılan dil var ise onu kapatıp son seçileni aktifleştirir.
            if(isset($input['dilvarsayilan'])){
                $varsayilandiller=siteLanguage::where('dilvarsayilan','=','on')->get();
                foreach ($varsayilandiller as $varsayilanlar){
                    siteLanguage::where('id','=',$varsayilanlar['id'])->update(['dilvarsayilan'=>'off']);
                }
            }
            siteLanguage::where('id','=',$input['id'])->update($input);
            return redirect()->back()->with('basarimesaji','Dil başarıyla güncellendi.');
        }else{
            return redirect()->back()->with('hatamesaji','Dil düzenlerken bir hata gerçekleşti.');
        }
    }
    //Site Dil Edit Post - Bitiş

    //Diller sayfasından JS varsayılan dil değişimi - Başlangıç
    function adminLangVarsEdit($id)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=siteLanguage::where('id','=',$id)->count();
        if(!$c==0){
            $varsayilandiller=siteLanguage::where('dilvarsayilan','=','on')->get();
            foreach ($varsayilandiller as $varsayilanlar){
                siteLanguage::where('id','=',$varsayilanlar['id'])->update(['dilvarsayilan'=>'off']);
            }
            siteLanguage::where('id','=',$id)->update(['dilvarsayilan'=>'on']);
            return redirect()->back()->with('basarimesaji','Dil başarıyla güncellendi.');
        }
    }
    //Diller sayfasından JS varsayılan dil değişimi - Başlangıç

    //Diller sayfasından JS ile dil aktifleştirme - Başlangıç
    function adminLangdurumEdit($id)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=siteLanguage::where('id','=',$id)->count();
        if(!$c==0){
            $data=siteLanguage::where('id','=',$id)->first();
            if ($data->dildurum=="on"){
                //Dil açık ise kapatıyoruz
                siteLanguage::where('id','=',$id)->update(['dildurum'=>'off']);
                return redirect()->back()->with('basarimesaji','Dil başarıyla güncellendi.');
            }else{
                //Dil kapalı ise açıyoruz
                siteLanguage::where('id','=',$id)->update(['dildurum'=>'on']);
                return redirect()->back()->with('basarimesaji','Dil başarıyla güncellendi.');
            }
        }else{
            return redirect()->back()->with('hatamesaji','Dil güncellerken hata oluştu.');
        }
    }
    //Diller sayfasından JS ile dil aktifleştirme - Bitiş

    //Site Dil Sil - Post Başlangıç
    function adminLangDel($id)
    {
        //$c değişkenine gelen idli dil olup olmadığını kontrol ettiriyoruz.
        $c=siteLanguage::where('id','=',$id)->count();
        if(!$c==0){
            //Eğer dil var ise veritabanından sildiriyoruz.
            siteLanguage::where('id','=',$id)->delete();
            return redirect()->back()->with('basarimesaji','Dil başarıyla silindi.');
        }else{
            //Dil bulunamadıysa hata mesajı ile geri döndürüyoruz.
            return redirect()->back()->with('hatamesaji','Dil silinirken bir hata oluştu.');
        }


    }
    //Site Dil Sil - Post Bitiş

    //SMTP Ayarlarını Listeleme - Başlangıç
    function adminSmtpSettings()
    {
        $data=siteSmtp::where('id','=',1)->first();
        return view('admin.settings.smtpsettings',['data'=>$data]);
    }
    //SMTP Ayarlarını Listeleme - Bitiş

    //SMTP Ayarlarının Güncellenmesi - Başlangıç
    function adminSmtpSettingsPost(Request $request)
    {
        $input=$request->except('_token');
        $c=siteSmtp::where('id','=',1)->count();
        if (!$c==0){
            siteSmtp::where('id','=',1)->update($input);
            return redirect()->back()->with('basarimesaji','SMTP ayarları başarıyla güncellendi');
        }else{
            return redirect()->back()->with('hatamesaji','SMTP ayarları güncellendirken bir hatayla karşılaştı.');
        }
    }
    //SMTP Ayarlarının Güncellenmesi - Bitiş

    //İletişim Ayarlarının Listeleme - Başlangıç
    public function adminContactSettings()
    {
        $c=siteContant::where('id','=',1)->count();
        if(!$c==0){
            $data=siteContant::where('id','=',1)->first();
            return view('admin.settings.contact',['data'=>$data]);
        }
        return redirect()->back()->with('hatamesaji','Veritabanında kayıt bulunamadı.');
    }
    //İletişim Ayarlarının Listeleme - Bitiş

    //İletişim Ayarlarının Güncellenmesi - Başlangıç
    function adminContactSettingsPost(Request $request)
    {
        $input=$request->except('_token');
        $c=siteContant::where('id','=',1)->count();
        if (!$c==0){
            siteContant::where('id','=',1)->update($input);
            return redirect()->back()->with('basarimesaji','SMTP ayarları başarıyla güncellendi');
        }else{
            return redirect()->back()->with('hatamesaji','SMTP ayarları güncellendirken bir hatayla karşılaştı.');
        }
    }
    //İletişim Ayarlarının Güncellenmesi - Bitiş
























    //Admin Giriş Sayfası Başlangıç
    function adminLogin()
    {
        //Giriş Yapılmışsa Login Sayfasına Yönlendirme İptali
        if(Session::get('girisDurum')=="ok"){
            return redirect()->route('adminIndex');
        }

        //Giriş Yapılmamışsa Templateye Gidebilir
        return view('admin.login');
    }
    //Admin Giriş Sayfası Bitiş

    //Admin Giriş Kontrol Mekanikması Başlangıç
    function adminGirisYap(Request $request)
    {
        //Input ile gelen verileri alıyoruz
        $login=$request->except('_token');

        //$c değişkenine veritabanında böyle bir kayıt olup olmadığını kontrol ediyoruz
        $c=user::where('email','=',$login['email'])->count();
        if(!$c==0){
            //Kayıt var ise işlemlere devam ediyor ve veritabanından datayı çekiyor
            $data=user::where('email','=',$login['email'])->first();
            if ($data->password == md5($login['password'])){
                if ($data->usergroup == 1 || $data->usergroup == 2){
                    //Giriş Başarılı ise Admin Anasayfaya Yönlendiriliyor
                    Session::put('girisDurum','ok');
                    Session::put('usergroup',$data->usergroup);
                    Session::put('userEmail',$data->email);
                    return redirect()->route('adminIndex')->with('basarimesaji','Giriş Başarılı');
                }else{
                    //Yetkisiz Giriş Denemesi
                    return redirect()->back()->with('hatamesaji','Yönetim panelini görüntüleme yetkiniz yok!');
                }
            }else{
                //Hatalı Şifre
                return redirect()->back()->with('hatamesaji','Şifreniz hatalı, lütfen kontrol edip tekrar deneyin.');
            }
            //echo "Üye var";
        }else{
            //Hatalı Mail
            return redirect()->back()->with('hatamesaji','Email hatalı, lütfen kontrol edip tekrar deneyin.');
        }
    }
    //Admin Giriş Kontrol Mekanikması Bitiş

    function logout()
    {
        if(Session::get('girisDurum')=="ok"){
            //Giriş yapışmışsa Sessionların hepsini sildiriyoruz.
            Session::flush();
            return redirect()->route('adminIndex');
        }else{
            //Giriş yapılmamışsa login page yönlendiriyor.
            return redirect()->route('adminLogin');
        }
    }

}
