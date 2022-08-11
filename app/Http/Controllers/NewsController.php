<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $news=News::with('translations')->orderBy('created_at','DESC')->skip(($page-1)*4)->take(4)->get();
        $len = count(News::all());
        return view('front.pages.news',compact('news','page','len'));
    }
}
