<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class frontIndexController extends Controller
{
    public function frontIndex()
    {
        return view('front.index');
    }
    public function frontKurumsalSayfalar($seourl)
    {

    }
    public function frontProduct()
    {

    }
    public function frontSayfalar($seourl)
    {

    }
    public function frontHaberler()
    {
        return view('front.kitaplik');

    }
    public function frontHaberDetay($haber)
    {
        return view('front.kitaplik');

    }
    public function frontSarapoloji()
    {

    }
    public function frontServices($tur)
    {

    }
    public function frontContact()
    {
        return view('front.contact');
    }
    public function frontDilDegis($lang)
    {
        Session::forget('dil');
        Session::put('dil',$lang);
        //return redirect()->route('aboutUs');
        return response()->json(['status'=>true,'message'=>'Başarıla Dil Değiştirildi']);

    }
    public function frontPrivacyPolicy()
    {
        return view('front.privacy-policy');
    }
    public function frontgizliliksozlesmesiPage()
    {
        return view('front.privacy-policy');
    }
    public function frontCookiesPolicy()
    {
        return view('front.privacy-policy');
    }

    public function aboutUs()
    {
        return view('front.about-us');

    }
    public function frontRegister()
    {
        return view('front.register');

    }
    public function frontRegisterPost(Request $request)
    {
        $input = $request->only('firstname','email','password');
        $input['lastname'] = '';
        $input['password']=md5($input['password']);
        $c=user::where('email','=',$input['email'])->count();
        if ($c==0){
            user::create($input);
            return redirect()->route('frontIndex')->with('basarimesaji','Yeni kullanıcı başarıyla eklendi.');
        }else{
            return redirect()->route('frontIndex')->with('hatamesaji','Eklemeye çalıştığınız kullanıcı zaten kayıtlı.');
        }

    }
    public function frontLogin()
    {
        if (Session::has('frontGirisDurum'))
            return redirect()->back();
        return view('front.login');
    }
    public function frontLoginPost(Request $request)
    {
        $login = $request->only('email','password');
        $data=user::where('email','=',$login['email'])->first();
        if ($data->password == md5($login['password'])){
            Session::put('frontGirisDurum','ok');
            Session::put('userEmail',$data->email);
            Session::put('userName',$data->firstname . ' ' . $data->lastname);
            return redirect()->route('frontIndex')->with('basarimesaji','Giriş Başarılı');
        }else{
            return redirect()->back()->with('hatamesaji','Şifreniz hatalı, lütfen kontrol edip tekrar deneyin.');
        }
    }
    public function frontProfil()
    {
        return view('front.about-us');
    }
    public function frontLogout()
    {
        Session::forget('frontGirisDurum');
        Session::forget('userEmail');
        Session::forget('userName');
        return view('front.login');

    }
    public function qrControl($id,$tmes)
    {

    }
    public function frontAdisyonEkle()
    {

    }
    public function frontAdisyonSil($id)
    {

    }
}
