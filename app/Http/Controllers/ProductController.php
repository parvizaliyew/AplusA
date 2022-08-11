<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function catalog($slug)
    {
        $category=Category::where('slug_az',$slug)->orWhere('slug_en',$slug)->orWhere('slug_ru',$slug)->first();
        $products=Product::withTranslations()->where('category_id',$category->id)->get();

        foreach($products as $key => $product){
            $products[$key]['sub_products'] = Product::withTranslations()->
            where('category_id',$category->id)->where('product_id',$product->id)->count();
        }
        return view('front.pages.catalog',compact('products','category'));
    }

    public function product($slug,$product2)
    { 
        $category=Category::withTranslations()->where('slug_az',$slug)->orWhere('slug_en',$slug)->orWhere('slug_ru',$slug)->first();
        $product=Product::where('slug_az',$product2)->orWhere('slug_en',$product2)->orWhere('slug_ru',$product2)->first();
        $sub_products=Product::withTranslations()->where('product_id',$product->id)->get();
    return view('front.pages.product',compact('sub_products','category'));
    }

    public function search(Request $request)
    {
        $search=$request->input('search');

         $product = Product::withTranslations()->where('name','LIKE','%'.$search.'%')->first(); 
        // $products = Product::withTranslations()->get();
        // foreach ($products as $produc) {
        //     $product=$produc->getTranslatedAttribute('name',app()->getLocale(),'az');
        // }
        // return $product;
        return view('front.pages.search',compact('product'));

    }
}
