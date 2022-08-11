<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\News;
use App\Models\Partner;
use App\Models\Category;
use App\Models\InfoCounter;
use App\Models\Contact;
use App\Models\ProjectType;


class HomeController extends Controller
{
    public function index()
    {
        $sliders=Slider::with('translations')->get();
        $news=News::with('translations')->orderBy('created_at','DESC')->take(4)->get();
        $partners=Partner::orderBy('created_at','DESC')->get();
        $categories=Category::with('translations')->get();
        $counters=InfoCounter::get();
        $project_types=ProjectType::with('translations')->get();
        return view('front.pages.home',compact('sliders','news','partners','categories','counters','project_types'));
    }
}
