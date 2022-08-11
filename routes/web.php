<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;

$locale = Request::segment(1);

if(in_array($locale, ['az','en','ru'])){
    App::setLocale($locale);
}else{
    App::setLocale('az');

    $locale = '';
}
Route::get('/',[HomeController::class,'index'])->name('index.az'); 
Route::get('/en',[HomeController::class,'index'])->name('index.en'); 
Route::get('/ru',[HomeController::class,'index'])->name('index.ru'); 


Route::get('/sirket-haqqinda',[AboutController::class,'index'])->name('about.az'); 
Route::get('/en/about-company',[AboutController::class,'index'])->name('about.en'); 
Route::get('/ru/o-kompanii',[AboutController::class,'index'])->name('about.ru'); 

Route::get('/qalereyalar',[AboutController::class,'galery'])->name('galeries.az'); 
Route::get('/en/galleries',[AboutController::class,'galery'])->name('galeries.en'); 
Route::get('/ru/galereyas',[AboutController::class,'galery'])->name('galeries.ru'); 

Route::get('/qalereya/{slug}',[AboutController::class,'sub_galery'])->name('galery.az'); 
Route::get('/en/gallery/{slug}',[AboutController::class,'sub_galery'])->name('galery.en'); 
Route::get('/ru/galereya/{slug}',[AboutController::class,'sub_galery'])->name('galery.ru'); 

Route::get('/elaqe',[ContactController::class,'index'])->name('contact.az'); 
Route::get('/en/contact',[ContactController::class,'index'])->name('contact.en'); 
Route::get('/ru/kontakti',[ContactController::class,'index'])->name('contact.ru'); 
Route::post('elaqe/post',[ContactController::class,'contact_post'])->name('contact_post');

Route::get('/xeberler',[NewsController::class,'index'])->name('xeberler.az');
Route::get('/en/news',[NewsController::class,'index'])->name('xeberler.en');
Route::get('/ru/novosti',[NewsController::class,'index'])->name('xeberler.ru');

Route::get('/mehsullar-ve-heller/{slug}',[ProductController::class,'catalog'])->name('mehsullar.az');
Route::get('/en/products-and-solutions/{slug}',[ProductController::class,'catalog'])->name('mehsullar.en');
Route::get('/ru/produkti-i-resheniya/{slug}',[ProductController::class,'catalog'])->name('mehsullar.ru');

Route::get('/mehsul-ve-hell/{slug}/{product2}',[ProductController::class,'product'])->name('mehsul.az');
Route::get('/en/product-and-solution/{slug}/{product2}',[ProductController::class,'product'])->name('mehsul.en');
Route::get('/ru/produkt-i-resheniya/{slug}/{product2}',[ProductController::class,'product'])->name('mehsul.ru');

Route::get('/layiheler',  [ProjectController::class,'index'])->name('layiheler.az');
Route::get('/en/projects',[ProjectController::class,'index'])->name('layiheler.en');
Route::get('/ru/proekti', [ProjectController::class,'index'])->name('layiheler.ru');

Route::get('/layihe/{slug}',  [ProjectController::class,'project_single'])->name('layihe.az');
Route::get('/en/project/{slug}',[ProjectController::class,'project_single'])->name('layihe.en');
Route::get('/ru/proekt/{slug}', [ProjectController::class,'project_single'])->name('layihe.ru');

Route::get('/search',[ProductController::class,'search'])->name('search');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
