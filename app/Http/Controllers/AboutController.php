<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Certificate;
use App\Models\Partner;


class AboutController extends Controller
{
    public function index()
    {
        $certificates       = Certificate::orderBy('id','DESC')->get();
        $partners           = Partner::orderBy('created_at','DESC')->get();
        return view('front.pages.about',compact('certificates','partners'));
    }

    public function galery()
    {
        $galeries           = Galery::withTranslations()->orderBy('created_at','DESC')->get();
        
        return view('front.pages.galery',compact('galeries'));
    }

    public function sub_galery($slug)
    {
       $galery              = Galery::withTranslations()->where('slug_az',$slug)->orWhere('slug_en',$slug)->orWhere('slug_ru',$slug)->first();
       $sub_galeries        = Galery::withTranslations()->where('galery_id',$galery->id)->get();
       $sub_galery_count    = $sub_galeries->count();
       $galeries            = Galery::withTranslations()->orderBy('created_at','DESC')->get();
       return view('front.pages.galery-single',compact('sub_galeries','galery','sub_galery_count','galeries'));
    }
}
