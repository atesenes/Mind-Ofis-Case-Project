<?php

namespace App\Http\Controllers;

use App\Http\Helper\fHelper;
use App\Models\siteCategoires;
use App\Models\siteLanguage;
use App\Models\siteProducts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class adminProductsController extends Controller
{
    //Admin Product Listeleme - Başlangıç
    public function adminProductList()
    {
        //Herhangi bir ürün olup olmadığını kontrol ediyoruz.
        $c=siteProducts::count();
        if(!$c==0){
            //Daha önceden bir ürün eklenmiş ise data ile birlikte sayfaya yönlendiriyoruz.
            $data=siteProducts::where('diletiket','=','tr')->get();
            return view('admin.products.productlist',['data'=>$data]);
        }else{
            //Daha önce bir ürün eklenmemiş ise direkt boş sayfa gösteriyoruz.
            return view('admin.products.productlist',['data'=>0]);
        }
    }
    //Admin Product Listeleme - Bitiş

    //Admin Product Ekleme - Başlangıç
    public function adminAddProduct()
    {
        $diller=siteLanguage::all();
        $anakategoriler=siteCategoires::where('diletiket','=','tr')->get();
        return view('admin.products.addproduct',['diller'=>$diller,'anakategoriler'=>$anakategoriler]);
    }
    //Admin Product Ekleme - Bitiş

    //Admin Product Ekleme Post - Başlangıç
    public function adminAddProductPost(Request $request)
    {
        $input=$request->except('_token');
        //dd($input);
        if (!isset($input['sira'])){
            //Sıra girilmemiş ise varsayılan 1 değerini atıyoruz
            $input['sira']=1;
        }

        if ($input['kategori']==null || empty($input['kategori'])){
            //Kategoıri seçilmemişse ürünü kayıt edip durumunu pasif olarak değiştiriyoruz.
            $input['durum']=2;

        }

        if (!isset($input['ozet'][0])){
            $input['ozet'][0]="";
            $input['ozet'][1]="";
        }
        if (!isset($input['ozellikleri'][0])){
            $input['ozellikleri'][0]="";
            $input['ozellikleri'][1]="";
        }
        if (!isset($input['anasayfadurum'])){
            $input['anasayfadurum']=1;
        }
        if (!isset($input['footerdurum'])){
            $input['footerdurum']=1;
        }
        if (!isset($input['durum'])){
            $input['durum']=1;
        }

        //Kategori İmage Kaydetme
        if ($request->image){
            $imageName = 'product'.time().'.'.$request->image->extension();
            // Public Folder
            $upload=$request->image->move(public_path('uploadimage/product'), $imageName);
            $dbname='uploadimage/product/'.$imageName;
            $input['image']=$dbname;
        }else{
            $input['image']="";
        }

        $toplam=count($input['dil']);
        for ($i=0;$i<$toplam;$i++){
            $kaydet=DB::table('site_products')->insert([
                'kategori' => $input['kategori'],
                'productid'=>$input['productid'],
                'baslik' => $input['baslik'][$i],
                'icerik' => $input['icerik'][$i],
                'ozet' => $input['ozet'][$i],
                'ozellikleri' => $input['ozellikleri'][$i],
                'seobaslik' => $input['baslik'][$i],
                'seoaciklama' => $input['baslik'][$i],
                'sira' => $input['sira'],
                'dil' => $input['dil'][$i],
                'diletiket' => $input['diletiket'][$i],
                'anasayfadurum' => $input['anasayfadurum'],
                'footerdurum' => $input['footerdurum'],
                'durum' => $input['durum'],
                'image' => $input['image'],
                'seourl' => fHelper::seoUrl($input['baslik'][$i]),
                'fiyat' => $input['fiyat'],
                'created_at' => Carbon::now()->toDateTime()
            ]);
        }
        if ($kaydet){
            return redirect()->route('adminProductList')->with('basarimesaji','Kategori başarıyla kayıt edildi.');
        }else{
            return redirect()->route('adminProductList')->with('hatamesaji','Kategori eklenirken bir hata ile karşılaşıldı.');
        }
    }
    //Admin Product Ekleme Post - Bitiş

    //Admin Product Düzenleme - Başlangıç
    public function adminProductEdit($productid)
    {
        $c=siteProducts::where('productid','=',$productid)->count();
        if(!$c==0){
            $anakategoriler=siteCategoires::where([['diletiket','=','tr']])->get();
            $diller=siteLanguage::all();
            $data=siteProducts::where('productid','=',$productid)->get();
            $veri=array('data'=>$data,'diller'=>$diller,'anakategoriler'=>$anakategoriler);
            return view('admin.products.editproduct',$veri);
        }
    }
    //Admin Product Düzenleme - Bitiş

    //Admin Ürün Düzenleme Post - Başlangıç
    public function adminProductEditPost(Request $request)
    {
        $input=$request->except('_token');
        //dd($input);
        $c=siteProducts::where('id','=',$input['id'])->count();
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
                $imageName = 'product'.time().'.'.$input['image']->extension();
                // Public Folder
                $upload=$request->image->move(public_path('uploadimage/product'), $imageName);
                $dbname='uploadimage/product/'.$imageName;
                $input['image']=$dbname;
            }

            if ($input['kategori']==null || empty($input['kategori'])){
                //Kategoıri seçilmemişse ürünü kayıt edip durumunu pasif olarak değiştiriyoruz.
                $input['durum']=2;

            }

            if(isset($input['anasayfadurum']) and $input['anasayfadurum']=="on"){
                $input['anasayfadurum']=1;
            }else{
                $input['anasayfadurum']=2;
            }

            if(isset($input['footerdurum']) and $input['footerdurum']=="on"){
                $input['footerdurum']=1;
            }else{
                $input['footerdurum']=2;
            }

            if(isset($input['durum']) and $input['durum']=="on"){
                $input['durum']=1;
            }else{
                $input['durum']=1;
            }

            if(isset($input['kategori']) and $input['kategori']==null){
                $input['kategori']=null;
            }

            if (!isset($input['ozet'][0])){
                $input['ozet'][0]="";
                $input['ozet'][1]="";
            }
            if (!isset($input['ozellikleri'][0])){
                $input['ozellikleri'][0]="";
                $input['ozellikleri'][1]="";
            }
            if (!isset($input['anasayfadurum'])){
                $input['anasayfadurum']=1;
            }
            if (!isset($input['footerdurum'])){
                $input['footerdurum']=1;
            }
            if (!isset($input['durum'])){
                $input['durum']=1;
            }


            $toplam=count($input['dil']);
            for ($i=0;$i<$toplam;$i++){
                $guncelle=DB::table('site_products')
                    ->where('id','=',$input['id'][$i])
                    ->update([
                        'kategori' => $input['kategori'],
                        'baslik' => $input['baslik'][$i],
                        'icerik' => $input['icerik'][$i],
                        'ozet' => $input['ozet'][$i],
                        'ozellikleri' => $input['ozellikleri'][$i],
                        'image' => $input['image'],
                        'seobaslik' => $input['baslik'][$i],
                        'seoaciklama' => $input['baslik'][$i],
                        'sira' => $input['sira'],
                        'anasayfadurum' => $input['anasayfadurum'],
                        'footerdurum' => $input['footerdurum'],
                        'durum' => $input['durum'],
                        'dil' => $input['dil'][$i],
                        'diletiket' => $input['diletiket'][$i],
                        'fiyat' => $input['fiyat'],
                        'seourl' => fHelper::seoUrl($input['baslik'][$i])
                    ]);
            }

            return redirect()->route('adminProductList')->with('basarimesaji','Ürün güncellemesi başarıyla gerçekleşti.');
        }else{
            return redirect()->route('adminProductList')->with('hatamesai','Ürün güncellenirken bir hata oluştu.');
        }
    }
    //Admin Ürün Düzenleme Post - Bitiş

    //Admin Ürün Durum Güncelleme - Başlangıç
    public function adminProductdurumEdit($productid)
    {
        $c=siteProducts::where('productid','=',$productid)->count();
        if(!$c==0){
            $data=siteProducts::where('productid','=',$productid)->get();
            if(empty($data[0]['kategori']) || $data[0]['kategori']==null){
                return redirect()->route('adminProductEdit',['id'=>$data[0]['productid'],'focus'=>'select'])->with('hatamesaji','Kategorisi seçilmemiş ürünler otomatik olarak devredışı kalacak şekilde ayarlanmıştır. Lütfen ürün düzenleme sayfasından kategori seçiniz.');
            }
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                if ($data[$i]['durum']==1){
                    //Sayfa açık ise kapatıyoruz
                    $guncelle=siteProducts::where('id','=',$data[$i]['id'])->update(['durum'=>2]);
                }else{
                    //Sayfa kapalı ise açıyoruz
                    $guncelle=siteProducts::where('id','=',$data[$i]['id'])->update(['durum'=>1]);
                }
            }
            return redirect()->route('adminProductList')->with('basarimesaji','Ürün durum güncellemesi başarılı.');
        }else{
            return redirect()->route('adminProductList')->with('hatamesaji','Ürün durum güncellerken hata oluştu.');
        }
    }
    //Admin Ürün Durum Güncelleme - Bitiş

    //Admin Ürün Silme - Başlangıç
    public function adminProductDel($productid)
    {
        //Gelen ID ile eşlesen bir dil olup olmadığının kontrolü
        $c=siteProducts::where('productid','=',$productid)->count();
        if(!$c==0){
            $data=siteProducts::where('productid','=',$productid)->get();
            File::delete($data[0]['image']);
            $toplam=count($data);
            for ($i=0;$i<$toplam;$i++){
                $sil=siteProducts::where('id','=',$data[$i]['id'])->delete();
            }
            return redirect()->route('adminProductList')->with('basarimesaji','Blog başarıyla silindi.');
        }else{
            return redirect()->route('adminProductList')->with('hatamesaji','Blog silinirken hata oluştu.');
        }
    }
    //Admin Ürün Sİlme - Bitiş
}
