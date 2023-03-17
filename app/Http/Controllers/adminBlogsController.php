<?php

namespace App\Http\Controllers;

use App\Http\Helper\fHelper;
use App\Models\siteBlogs;
use App\Models\siteLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class adminBlogsController extends Controller
{
    //Admin Blogları Listeleme - Başlangıç
    public function adminBlogsList()
    {
        //Herhangi bir blog olup olmadığını kontrol ediyoruz.
        $c=siteBlogs::count();
        if(!$c==0){
            //Daha önceden bir blog eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteBlogs::where('diletiket','=','tr')->get();
            return view('admin.blogs.blogslist',['data'=>$data]);
        }else{
            //Daha önce bir dil eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.blogs.blogslist',['data'=>0]);
        }
    }
    //Admin Blogları Listeleme - Bitiş

    //Admin Kurumsal Ekleme - Başlangıç
    public function adminAddBlog()
    {
        $diller=siteLanguage::all();
        return view('admin.blogs.addblog',['diller'=>$diller]);
    }
    //Admin Kurumsal Ekleme - Bitiş

    //Admin Kurumsal Ekleme Post - Başlangıç
    public function adminAddBlogPost(Request $request)
    {
        $input=$request->except('_token');
        if (!isset($input['sira'])){
            //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
            $input['sira']=1;
        }
        //Sayfa İmage Kaydetme
        if ($request->image){
            $imageName = 'blogs'.time().'.'.$request->image->extension();
            // Public Folder
            $upload=$request->image->move(public_path('uploadimage/blogs'), $imageName);
            $dbname='uploadimage/blogs/'.$imageName;
            $input['image']=$dbname;
        }else{
            $input['image']="";
        }

        $toplam=count($input['dil']);
        for ($i=0;$i<$toplam;$i++){
            $kaydet=DB::table('site_blogs')->insert([
                'blogid' => $input['blogid'],
                'baslik' => $input['baslik'][$i],
                'kisaaciklama' => $input['kisaaciklama'][$i],
                'icerik' => $input['icerik'][$i],
                'ozet' => $input['ozet'][$i],
                'seobaslik' => $input['seobaslik'][0],
                'seoaciklama' => $input['seoaciklama'][0],
                'sira' => $input['sira'],
                'dil' => $input['dil'][$i],
                'diletiket' => $input['diletiket'][$i],
                'seourl' => fHelper::seoUrl($input['baslik'][$i]),
                'durum' => $input['durum'],
                'image' => $input['image']
            ]);
        }
        if ($kaydet){
            return redirect()->route('adminBlogsList')->with('basarimesaji','Blog başarıyla kayıt edildi.');
        }else{
            return redirect()->route('adminBlogsList')->with('hatamesaji','Blog eklenirken bir hata ile karşılaşıldı.');
        }
    }
    //Admin Kurumsal Ekleme Post - Bitiş

    //Admin Sayfa Düzenleme - Başlangıç
    public function adminBlogEdit($pagesid)
    {
        $c=siteBlogs::where('blogid','=',$pagesid)->count();
        if(!$c==0){
            $diller=siteLanguage::all();
            $data=siteBlogs::where('blogid','=',$pagesid)->get();
            return view('admin.blogs.editblog',['data'=>$data],['diller'=>$diller]);
        }
    }
    //Admin Sayfa Düzenleme - Bitiş

    //Admin Sayfa Düzenleme Post - Başlangıç
    public function adminBlogsEditPost(Request $request)
    {
        $input=$request->except('_token');
        //dd($input);
        $c=siteBlogs::where('id','=',$input['id'])->count();
        if(!$c==0){
            if (!isset($input['sira']) or $input['sira']==null){
                //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
                $input['sira']=1;
            }
            //Eğer yeni görsel gelmediyse eski görsel kalıyor.
            if(!isset($input['image'])){
                $input['image']=$input['oldimage'];
                unset($input['oldimage']);
            }else{
                File::delete($input['oldimage']);
                unset($input['oldimage']);
                //Slider İmage Kaydetme
                $imageName = 'blogs'.time().'.'.$input['image']->extension();
                // Public Folder
                $upload=$request->image->move(public_path('uploadimage/blogs'), $imageName);
                $dbname='uploadimage/blogs/'.$imageName;
                $input['image']=$dbname;
            }

            if(isset($input['durum']) and $input['durum']=="on"){
                $input['durum']=1;
            }else{
                $input['durum']=2;
            }

            $toplam=count($input['dil']);
            for ($i=0;$i<$toplam;$i++){
                $guncelle=DB::table('site_blogs')
                    ->where('id','=',$input['id'][$i])
                    ->update([
                        'baslik' => $input['baslik'][$i],
                        'kisaaciklama' => $input['kisaaciklama'][$i],
                        'icerik' => $input['icerik'][$i],
                        'ozet' => $input['ozet'][$i],
                        'image' => $input['image'],
                        'seobaslik' => $input['seobaslik'][$i],
                        'seoaciklama' => $input['seoaciklama'][$i],
                        'sira' => $input['sira'],
                        'durum' => $input['durum'],
                        'dil' => $input['dil'][$i],
                        'diletiket' => $input['diletiket'][$i],
                        'seourl' => fHelper::seoUrl($input['baslik'][$i])
                    ]);
            }

            return redirect()->route('adminBlogsList')->with('basarimesaji','Blog güncellemesi başarıyla gerçekleşti.');
        }else{
            return redirect()->route('adminBlogsList')->with('hatamesai','Blog güncellenirken bir hata oluştu.');
        }
    }
    //Admin Sayfa Düzenleme Post - Bitiş

    //Admin Pages sayfasından JS ile durum değiştirme - Başlangıç
    function adminBlogsdurumEdit($blogid)
    {
        $c=siteBlogs::where('blogid','=',$blogid)->count();
        if(!$c==0){
            $data=siteBlogs::where('blogid','=',$blogid)->get();
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                if ($data[$i]['durum']==1){
                    //Sayfa açık ise kapatıyoruz
                    $guncelle=siteBlogs::where('id','=',$data[$i]['id'])->update(['durum'=>2]);
                }else{
                    //Sayfa kapalı ise açıyoruz
                    $guncelle=siteBlogs::where('id','=',$data[$i]['id'])->update(['durum'=>1]);
                }
            }
            return redirect()->route('adminBlogsList')->with('basarimesaji','Blog durum güncellemesi başarılı.');
        }else{
            return redirect()->route('adminBlogsList')->with('hatamesaji','Blog durum güncellerken hata oluştu.');
        }
    }
    //Admin Pages sayfasından JS ile durum değiştirme - Bitiş

    //Admin Kurumsal sayfasından JS ile dil aktifleştirme - Başlangıç
    function adminBlogDel($blogid)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=siteBlogs::where('blogid','=',$blogid)->count();
        if(!$c==0){
            $data=siteBlogs::where('blogid','=',$blogid)->get();
            File::delete($data[0]['image']);
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                $sil=siteBlogs::where('id','=',$data[$i]['id'])->delete();
            }
            return redirect()->route('adminBlogsList')->with('basarimesaji','Blog başarıyla silindi.');
        }else{
            return redirect()->route('adminBlogsList')->with('hatamesaji','Blog silinirken hata oluştu.');
        }
    }
    //Admin Kurumsal sayfasından JS ile dil aktifleştirme - Bitiş
}
