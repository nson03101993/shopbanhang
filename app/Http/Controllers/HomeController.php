<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Redirect;
use File;

class HomeController extends Controller
{
    //
    public function index(){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $sub_brand = Brand::where('brand_status','1')->orderBy('brand_id','asc')->limit(5)->get();
        $product = Product::where('product_status','1')->orderBy('product_id','desc')->limit(5)->get();
        return view('pages.home', compact('category', 'brand', 'sub_brand', 'product'));
    }

    public function searchByKeywords(Request $request){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $keywords = $request->keywords;
        $search_result = Product::where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.search.keywords', compact('category', 'brand', 'keywords', 'search_result'));
    }
}
