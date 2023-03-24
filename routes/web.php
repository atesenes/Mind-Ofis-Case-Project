<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//FRONT ROUTE
Route::group(['prefix'=>'/','namespace'=>'/','middleware'=>'frontDilSorgu'],function (){
    Route::get('',[\App\Http\Controllers\frontIndexController::class,'frontIndex'])->name('frontIndex');
    Route::get('/etkinlikler',[\App\Http\Controllers\frontIndexController::class,'frontHaberler'])->name('frontHaberler');
    Route::get('/etkinlik/{id?}',[\App\Http\Controllers\frontIndexController::class,'frontHaberDetay'])->name('frontHaberDetay');
    Route::get('/contact',[\App\Http\Controllers\frontIndexController::class,'frontContact'])->name('frontContact');
    Route::get('/dildegis/{id}',[\App\Http\Controllers\frontIndexController::class,'frontDilDegis'])->name('frontDilDegis');
    Route::get('/privacy-policy',[\App\Http\Controllers\frontIndexController::class,'frontPrivacyPolicy'])->name('frontPrivacyPolicy');
    Route::get('/terms-and-conditions',[\App\Http\Controllers\frontIndexController::class,'frontgizliliksozlesmesiPage'])->name('frontgizliliksozlesmesiPage');
    Route::get('/cookies-policy',[\App\Http\Controllers\frontIndexController::class,'frontCookiesPolicy'])->name('frontCookiesPolicy');
    Route::get('/about-us',[\App\Http\Controllers\frontIndexController::class,'aboutUs'])->name('aboutUs');
    //Blog
    Route::get('/blogLists',[\App\Http\Controllers\frontBlogController::class,'index'])->name('frontBlogList');
    Route::get('/blog/{blog}',[\App\Http\Controllers\frontBlogController::class,'detail'])->name('frontBlogDetail');

    //Kayıt Ol
    Route::get('/register',[\App\Http\Controllers\frontIndexController::class,'frontRegister'])->name('frontRegister');
    Route::post('/registerpost',[\App\Http\Controllers\frontIndexController::class,'frontRegisterPost'])->name('frontRegisterPost');
    //Giriş Yap
    Route::get('/login',[\App\Http\Controllers\frontIndexController::class,'frontLogin'])->name('frontLogin');
    Route::post('/loginpost',[\App\Http\Controllers\frontIndexController::class,'frontLoginPost'])->name('frontLoginPost');
});
Route::group(['prefix'=>'/','namespace'=>'/','middleware'=>'frontDilSorgu','frontGirisSorgu'],function (){
    Route::get('/logout',[\App\Http\Controllers\frontIndexController::class,'frontLogout'])->name('frontLogout');

});
//ADMİN ROUTE
Route::group(['prefix'=>'admin','namespace'=>'admin'], function(){
    Route::get('/',[\App\Http\Controllers\adminSetController::class,'index'])->name('adminIndex')->middleware('girisSorgu');
    //Admin Login
    Route::get('/login',[\App\Http\Controllers\adminSetController::class,'adminLogin'])->name('adminLogin');
    Route::post('/loginPost',[\App\Http\Controllers\adminSetController::class,'adminGirisYap'])->name('adminGirisYap');
    Route::get('/logout',[\App\Http\Controllers\adminSetController::class,'logout'])->name('logout')->middleware('girisSorgu');
    //Admin Ayarlar
    Route::get('/settings',[\App\Http\Controllers\adminSetController::class,'adminSiteSettings'])->name('adminSiteSettings')->middleware('girisSorgu');
    Route::post('/settingsUpdate',[\App\Http\Controllers\adminSetController::class,'adminSiteSettingsUpdate'])->name('adminSiteSettingsUpdate')->middleware('girisSorgu');
    Route::get('/languageset',[\App\Http\Controllers\adminSetController::class,'adminLangSettings'])->name('adminLangSettings')->middleware('girisSorgu');
    Route::get('/addlanguage',[\App\Http\Controllers\adminSetController::class,'adminAddLangSettings'])->name('adminAddLangSettings')->middleware('girisSorgu');
    Route::post('/addlanguagepost',[\App\Http\Controllers\adminSetController::class,'adminAddLangSettingsPost'])->name('adminAddLangSettingsPost')->middleware('girisSorgu');
    Route::get('/languageedit/{id}',[\App\Http\Controllers\adminSetController::class,'adminLangEdit'])->name('adminLangEdit')->middleware('girisSorgu');
    Route::get('/languagedel/{id}',[\App\Http\Controllers\adminSetController::class,'adminLangDel'])->name('adminLangDel')->middleware('girisSorgu');
    Route::post('languageeditpost',[\App\Http\Controllers\adminSetController::class,'adminLangEditPost'])->name('adminLangEditPost')->middleware('girisSorgu');
    Route::get('langvarsayilanedit/{id}',[\App\Http\Controllers\adminSetController::class,'adminLangVarsEdit'])->name('adminLangVarsEdit')->middleware('girisSorgu');
    Route::get('langdurumedit/{id}',[\App\Http\Controllers\adminSetController::class,'adminLangdurumEdit'])->name('adminLangdurumEdit')->middleware('girisSorgu');
    Route::get('smtpsettings',[\App\Http\Controllers\adminSetController::class,'adminSmtpSettings'])->name('adminSmtpSettings')->middleware('girisSorgu');
    Route::post('smtpsettingspost',[\App\Http\Controllers\adminSetController::class,'adminSmtpSettingsPost'])->name('adminSmtpSettingsPost')->middleware('girisSorgu');
    Route::get('contantsettings',[\App\Http\Controllers\adminSetController::class,'adminContactSettings'])->name('adminContactSettings')->middleware('girisSorgu');
    Route::post('contantsettingspost',[\App\Http\Controllers\adminSetController::class,'adminContactSettingsPost'])->name('adminContactSettingsPost')->middleware('girisSorgu');
    //Admin User
    Route::get('/users',[\App\Http\Controllers\adminUsersController::class,'adminUsersList'])->name('adminUsersList')->middleware('girisSorgu');
    Route::get('/usersonaysiz',[\App\Http\Controllers\adminUsersController::class,'adminUsersOnaysizList'])->name('adminUsersOnaysizList')->middleware('girisSorgu');
    Route::get('/addusers',[\App\Http\Controllers\adminUsersController::class,'adminAddUsers'])->name('adminAddUsers')->middleware('girisSorgu');
    Route::post('/adduserspost',[\App\Http\Controllers\adminUsersController::class,'adminAddUsersPost'])->name('adminAddUsersPost')->middleware('girisSorgu');
    Route::get('/useredit/{id}',[\App\Http\Controllers\adminUsersController::class,'adminUserEdit'])->name('adminUserEdit')->middleware('girisSorgu');
    Route::post('/usereditpost',[\App\Http\Controllers\adminUsersController::class,'adminUserEditPost'])->name('adminUserEditPost')->middleware('girisSorgu');
    Route::get('/userdel/{id}',[\App\Http\Controllers\adminUsersController::class,'adminUserDel'])->name('adminUserDel')->middleware('girisSorgu');
    //Admin User Pasaport Onay/Ret
    Route::get('/userpassonay/{userid}',[\App\Http\Controllers\adminUsersController::class,'adminPassportOnay'])->name('adminPassportOnay')->middleware('girisSorgu');
    Route::get('/userpassret/{userid}',[\App\Http\Controllers\adminUsersController::class,'adminPassportRet'])->name('adminPassportRet')->middleware('girisSorgu');
    //Admin Slider
    Route::get('/sliders',[\App\Http\Controllers\adminSliderController::class,'adminSliderList'])->name('adminSliderList')->middleware('girisSorgu');
    Route::get('/addslider',[\App\Http\Controllers\adminSliderController::class,'adminAddSlider'])->name('adminAddSlider')->middleware('girisSorgu');
    Route::post('/addsliderpost',[\App\Http\Controllers\adminSliderController::class,'adminAddSliderPost'])->name('adminAddSliderPost')->middleware('girisSorgu');
    Route::get('sliderdurumedit/{id}',[\App\Http\Controllers\adminSliderController::class,'adminSliderdurumEdit'])->name('adminSliderdurumEdit')->middleware('girisSorgu');
    Route::get('/editslider/{id}',[\App\Http\Controllers\adminSliderController::class,'adminSliderEdit'])->name('adminSliderEdit')->middleware('girisSorgu');
    Route::post('/editsliderpost',[\App\Http\Controllers\adminSliderController::class,'adminSliderEditPost'])->name('adminSliderEditPost')->middleware('girisSorgu');
    Route::get('/sliderdel/{id}',[\App\Http\Controllers\adminSliderController::class,'adminSliderDel'])->name('adminSliderDel')->middleware('girisSorgu');
    //Admin Kurumsal Sayfalar
    Route::get('/kurumsal',[\App\Http\Controllers\adminKurumsalController::class,'adminKurumsalList'])->name('adminKurumsalList')->middleware('girisSorgu');
    Route::get('/addkurumsal',[\App\Http\Controllers\adminKurumsalController::class,'adminAddKurumsal'])->name('adminAddKurumsal')->middleware('girisSorgu');
    Route::post('/addkurumsalpost',[\App\Http\Controllers\adminKurumsalController::class,'adminAddKurumsalPost'])->name('adminAddKurumsalPost')->middleware('girisSorgu');
    Route::get('/editkurumsal/{id}',[\App\Http\Controllers\adminKurumsalController::class,'adminKurumsalEdit'])->name('adminKurumsalEdit')->middleware('girisSorgu');
    Route::post('/editkurumsalpost',[\App\Http\Controllers\adminKurumsalController::class,'adminKurumsalEditPost'])->name('adminKurumsalEditPost')->middleware('girisSorgu');
    Route::get('/kurumsaldurumedit/{id}',[\App\Http\Controllers\adminKurumsalController::class,'adminKurumsaldurumEdit'])->name('adminKurumsaldurumEdit')->middleware('girisSorgu');
    Route::get('/kurumsaldel/{id}',[\App\Http\Controllers\adminKurumsalController::class,'adminKurumsalDel'])->name('adminKurumsalDel')->middleware('girisSorgu');
    //Admin Sayfalar
    Route::get('/pages',[\App\Http\Controllers\adminPagesController::class,'adminPagesList'])->name('adminPagesList')->middleware('girisSorgu');
    Route::get('/addpages',[\App\Http\Controllers\adminPagesController::class,'adminAddPages'])->name('adminAddPages')->middleware('girisSorgu');
    Route::post('/addpagespost',[\App\Http\Controllers\adminPagesController::class,'adminAddPagesPost'])->name('adminAddPagesPost')->middleware('girisSorgu');
    Route::get('/editpages/{id}',[\App\Http\Controllers\adminPagesController::class,'adminPagesEdit'])->name('adminPagesEdit')->middleware('girisSorgu');
    Route::post('/editpagespost',[\App\Http\Controllers\adminPagesController::class,'adminPagesEditPost'])->name('adminPagesEditPost')->middleware('girisSorgu');
    Route::get('/pagesdurumedit/{id}',[\App\Http\Controllers\adminPagesController::class,'adminPagesdurumEdit'])->name('adminPagesdurumEdit')->middleware('girisSorgu');
    Route::get('/pagesdel/{id}',[\App\Http\Controllers\adminPagesController::class,'adminPagesDel'])->name('adminPagesDel')->middleware('girisSorgu');
    //Admin Blog Konular
    Route::get('/blogs',[\App\Http\Controllers\adminBlogsController::class,'adminBlogsList'])->name('adminBlogsList')->middleware('girisSorgu');
    Route::get('/addblogs',[\App\Http\Controllers\adminBlogsController::class,'adminAddBlog'])->name('adminAddBlogs')->middleware('girisSorgu');
    Route::post('/addblogpost',[\App\Http\Controllers\adminBlogsController::class,'adminAddBlogPost'])->name('adminAddBlogsPost')->middleware('girisSorgu');
    Route::get('/editblog/{id}',[\App\Http\Controllers\adminBlogsController::class,'adminBlogEdit'])->name('adminBlogEdit')->middleware('girisSorgu');
    Route::post('/editblogspost',[\App\Http\Controllers\adminBlogsController::class,'adminBlogsEditPost'])->name('adminBlogsEditPost')->middleware('girisSorgu');
    Route::get('/blogsdurumedit/{id}',[\App\Http\Controllers\adminBlogsController::class,'adminBlogsdurumEdit'])->name('adminBlogsdurumEdit')->middleware('girisSorgu');
    Route::get('/blogdel/{id}',[\App\Http\Controllers\adminBlogsController::class,'adminBlogDel'])->name('adminBlogDel')->middleware('girisSorgu');
    //Admin Kategoriler
    Route::get('/categories',[\App\Http\Controllers\adminCategoriesController::class,'adminCatsList'])->name('adminCatsList')->middleware('girisSorgu');
    Route::get('/addcategori',[\App\Http\Controllers\adminCategoriesController::class,'adminAddCat'])->name('adminAddCat')->middleware('girisSorgu');
    Route::post('/addcategoripost',[\App\Http\Controllers\adminCategoriesController::class,'adminAddCatPost'])->name('adminAddCatPost')->middleware('girisSorgu');
    Route::get('/editcategori/{id}',[\App\Http\Controllers\adminCategoriesController::class,'adminCatEdit'])->name('adminCatEdit')->middleware('girisSorgu');
    Route::post('/editcategoripost',[\App\Http\Controllers\adminCategoriesController::class,'adminCatEditPost'])->name('adminCatEditPost')->middleware('girisSorgu');
    Route::get('/categoridurumedit/{id}',[\App\Http\Controllers\adminCategoriesController::class,'adminCatdurumEdit'])->name('adminCatdurumEdit')->middleware('girisSorgu');
    Route::get('/categoridel/{id}',[\App\Http\Controllers\adminCategoriesController::class,'adminCatDel'])->name('adminCatDel')->middleware('girisSorgu');
    //Admin Product
    Route::get('/products',[\App\Http\Controllers\adminProductsController::class,'adminProductList'])->name('adminProductList')->middleware('girisSorgu');
    Route::get('/addproduct',[\App\Http\Controllers\adminProductsController::class,'adminAddProduct'])->name('adminAddProduct')->middleware('girisSorgu');
    Route::post('/addproductpost',[\App\Http\Controllers\adminProductsController::class,'adminAddProductPost'])->name('adminAddProductPost')->middleware('girisSorgu');
    Route::get('/editproduct/{id}',[\App\Http\Controllers\adminProductsController::class,'adminProductEdit'])->name('adminProductEdit')->middleware('girisSorgu');
    Route::post('/editproductpost',[\App\Http\Controllers\adminProductsController::class,'adminProductEditPost'])->name('adminProductEditPost')->middleware('girisSorgu');
    Route::get('/productdurumedit/{id}',[\App\Http\Controllers\adminProductsController::class,'adminProductdurumEdit'])->name('adminProductdurumEdit')->middleware('girisSorgu');
    Route::get('/productdel/{id}',[\App\Http\Controllers\adminProductsController::class,'adminProductDel'])->name('adminProductDel')->middleware('girisSorgu');
    //Admin Markalar & Referanslar
    Route::get('/photolist',[\App\Http\Controllers\adminMarkarlarController::class,'adminMarkalarList'])->name('adminMarkalarList')->middleware('girisSorgu');
    Route::get('/addphoto',[\App\Http\Controllers\adminMarkarlarController::class,'adminAddMarka'])->name('adminAddMarka')->middleware('girisSorgu');
    Route::post('/addphotopost',[\App\Http\Controllers\adminMarkarlarController::class,'adminAddMarkaPost'])->name('adminAddMarkaPost')->middleware('girisSorgu');
    Route::get('/editphoto/{id?}',[\App\Http\Controllers\adminMarkarlarController::class,'adminEditMarka'])->name('adminEditMarka')->middleware('girisSorgu');
    Route::post('/editphotopost',[\App\Http\Controllers\adminMarkarlarController::class,'adminEditMarkaPost'])->name('adminEditMarkaPost')->middleware('girisSorgu');
    Route::get('/photodurumedit/{id}',[\App\Http\Controllers\adminMarkarlarController::class,'adminMarkaDurumEdit'])->name('adminMarkaDurumEdit')->middleware('girisSorgu');
    Route::get('/photodel/{id}',[\App\Http\Controllers\adminMarkarlarController::class,'adminMarkaDel'])->name('adminMarkaDel')->middleware('girisSorgu');
    //Admin Popup
    Route::get('/popuplist',[\App\Http\Controllers\adminPopupController::class,'adminPopupList'])->name('adminPopupList')->middleware('girisSorgu');
    Route::get('/addpopup',[\App\Http\Controllers\adminPopupController::class,'adminAddPopup'])->name('adminAddPopup')->middleware('girisSorgu');
    //Admin Kiralama
    Route::get('/basvurulist',[\App\Http\Controllers\adminKiralamaController::class,'adminKiralamaList'])->name('adminKiralamaList')->middleware('girisSorgu');
    Route::get('/basvurudetay/{id}',[\App\Http\Controllers\adminKiralamaController::class,'adminKiralamaDetay'])->name('adminKiralamaDetay')->middleware('girisSorgu');
    Route::get('/basvurusil/{id}',[\App\Http\Controllers\adminKiralamaController::class,'adminKiralamaSil'])->name('adminKiralamaSil')->middleware('girisSorgu');
    //Admin Kulüp
    Route::get('/uyelikkategorisi',[\App\Http\Controllers\adminKulupUyelikController::class,'adminUyelikKategorisiList'])->name('adminUyelikKategorisiList')->middleware('girisSorgu');
    Route::get('/adduyelikkategorisi',[\App\Http\Controllers\adminKulupUyelikController::class,'adminUyelikKategorisiAdd'])->name('adminUyelikKategorisiAdd')->middleware('girisSorgu');
    Route::post('/adduyelikkategorisipost',[\App\Http\Controllers\adminKulupUyelikController::class,'adminUyelikKategorisiAddPost'])->name('adminUyelikKategorisiAddPost')->middleware('girisSorgu');
    Route::get('/edituyelikkategorisi/{id}',[\App\Http\Controllers\adminKulupUyelikController::class,'adminUyelikKategorisiEdit'])->name('adminUyelikKategorisiEdit')->middleware('girisSorgu');
    Route::post('/edituyelikkategorisipost',[\App\Http\Controllers\adminKulupUyelikController::class,'adminUyelikKategorisiEditPost'])->name('adminUyelikKategorisiEditPost')->middleware('girisSorgu');
    Route::get('/uyelikkategorisidurumedit/{id}',[\App\Http\Controllers\adminKulupUyelikController::class,'adminUyelikKategoriDurumEdit'])->name('adminUyelikKategoriDurumEdit')->middleware('girisSorgu');
    Route::get('/uyelikkategorisidel/{id}',[\App\Http\Controllers\adminKulupUyelikController::class,'adminUyelikKategorisiDel'])->name('adminUyelikKategorisiDel')->middleware('girisSorgu');
    //QR
    Route::get('/qroku',[\App\Http\Controllers\adminQrController::class,'adminQrOku'])->name('adminQrOku')->middleware('girisSorgu');
    //Borsa
    Route::get('/verilistele',[\App\Http\Controllers\adminBorsaController::class,'adminBorsaList'])->name('adminBorsaList')->middleware('girisSorgu');
    Route::get('/veriekle',[\App\Http\Controllers\adminBorsaController::class,'adminAddBorsa'])->name('adminAddBorsa')->middleware('girisSorgu');
    Route::post('/verieklepost',[\App\Http\Controllers\adminBorsaController::class,'adminAddBorsaPost'])->name('adminAddBorsaPost')->middleware('girisSorgu');
    Route::get('/veriedit/{id}',[\App\Http\Controllers\adminBorsaController::class,'adminEditBorsa'])->name('adminEditBorsa')->middleware('girisSorgu');
    Route::post('/verieditpost',[\App\Http\Controllers\adminBorsaController::class,'adminEditBorsaPost'])->name('adminEditBorsaPost')->middleware('girisSorgu');
    Route::get('/veridurumedit/{id}',[\App\Http\Controllers\adminBorsaController::class,'adminBorsadurumEdit'])->name('adminBorsadurumEdit')->middleware('girisSorgu');
    Route::get('/veridel/{id}',[\App\Http\Controllers\adminBorsaController::class,'adminBorsaDel'])->name('adminBorsaDel')->middleware('girisSorgu');
    //Investments Kontrol
    Route::get('/investment/new',[\App\Http\Controllers\adminKiralamaController::class,'adminInvestNew'])->name('adminInvestNew')->middleware('girisSorgu');
    Route::get('/investment/process',[\App\Http\Controllers\adminKiralamaController::class,'adminInvestProcess'])->name('adminInvestProcess')->middleware('girisSorgu');
    Route::get('/investment/completed',[\App\Http\Controllers\adminKiralamaController::class,'adminInvestComplated'])->name('adminInvestComplated')->middleware('girisSorgu');
    Route::get('/investment/durumdegis/{isinid}/{durum}',[\App\Http\Controllers\adminKiralamaController::class,'adminDurumDegis'])->name('adminDurumDegis')->middleware('girisSorgu');
    //Borsa Transfer Şirketleri
    Route::get('/companylist',[\App\Http\Controllers\adminBorsaSirkerler::class,'adminSirketList'])->name('adminSirketList')->middleware('girisSorgu');
    Route::get('/companyadd',[\App\Http\Controllers\adminBorsaSirkerler::class,'adminSirketAdd'])->name('adminSirketAdd')->middleware('girisSorgu');
    Route::post('/companyaddPost',[\App\Http\Controllers\adminBorsaSirkerler::class,'adminSirketAddPost'])->name('adminSirketAddPost')->middleware('girisSorgu');
    Route::get('/companyedit/{id}',[\App\Http\Controllers\adminBorsaSirkerler::class,'adminSirketEdit'])->name('adminSirketEdit')->middleware('girisSorgu');
    Route::post('/companyeditPost',[\App\Http\Controllers\adminBorsaSirkerler::class,'adminSirketEditPost'])->name('adminSirketEditPost')->middleware('girisSorgu');
    Route::get('/companysil/{id}',[\App\Http\Controllers\adminBorsaSirkerler::class,'adminSirketDel'])->name('adminSirketDel')->middleware('girisSorgu');
    //Admin Banka Hesapları
    Route::get('/banklist',[\App\Http\Controllers\adminBankController::class,'adminBankaList'])->name('adminBankaList')->middleware('girisSorgu');
    Route::get('/addbank',[\App\Http\Controllers\adminBankController::class,'adminAddBanka'])->name('adminAddBanka')->middleware('girisSorgu');
    Route::post('/addbankpost',[\App\Http\Controllers\adminBankController::class,'adminAddBankaPost'])->name('adminAddBankaPost')->middleware('girisSorgu');
    Route::get('/bankadurumdegis/{id}',[\App\Http\Controllers\adminBankController::class,'adminBankDurumDegis'])->name('adminBankDurumDegis')->middleware('girisSorgu');
    Route::get('/bankdel/{id}',[\App\Http\Controllers\adminBankController::class,'adminBankDel'])->name('adminBankDel')->middleware('girisSorgu');

});
