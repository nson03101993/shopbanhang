<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductRequest;
use File;

class ProductController extends Controller
{   

      //Add product
    public function addProduct(){
        $category = Category::orderBy('cat_id','desc')->get();
        $brand = Brand::orderBy('brand_id','desc')->get();
        return view('admin.add_product', compact('category','brand'));
    }

    //Edit product
    public function listProduct(){
        $all_product = Product::with(['category','brand'])->paginate(4);
        $products = Product::with(['category','brand'])->get();
        $count = $all_product->count();
        $count_all = $products->count();
        if(isset($all_product)){
            return view('admin.list_product', compact('all_product', 'count','count_all'));
        }
        
    }


    //Save product
    public function saveProduct(ProductRequest $request){
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->cat_id = $request->product_category;
        $product->brand_id = $request->product_brand;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_desc = $request->product_desc;
        $product->product_content = $request->product_content;
        $product->product_status = $request->product_status;

        /* Xử lý ảnh */
        $get_image = $request->file('product_image');
        if(isset($get_image)){
            $fileExtension = $get_image->getClientOriginalExtension();
            $fileName = $get_image->getClientOriginalName();
            $fileRealName = current(explode('.',$fileName));
            $product->product_image = $fileRealName.rand(0,99).'.'.$fileExtension;
            $get_image->move('public/backend/uploads/product/',$product->product_image);
            $result = $product->save();
            if($result){
                return redirect()->route('add_product')->with('success', 'Đã thêm sản phẩm thành công');
            }
        }
        else{
            return redirect()->back()->with('message','Đối với sản phẩm mới xin vui lòng chọn ảnh để upload')->withInput();
        }
    }

    //Change product status from hide to unhide
    public function unhideProduct($product_id){
        $product = Product::find($product_id);
        $product->product_status = 1;
        $query = $product->save();
        if($query){
            return redirect()->route('list_product')
            ->with('message', 'Cập nhật trạng thái sản phẩm thành công');
        }
    }

    //Change product status from unhide to hide
    public function hideProduct($product_id){
        $product = Product::find($product_id);
        $product->product_status = 0;
        $query = $product->save();
        if($query){
            return redirect()->route('list_product')
            ->with('message', 'Cập nhật trạng thái sản phẩm thành công');
        }
    }

    //delete product from database
    public function deleteProduct($product_id, $product_image){
        $product = Product::find($product_id);
        $product->delete();
        $image_path = 'public/backend/uploads/product/'.$product_image;
        File::delete($image_path);
        return redirect()->route('list_product')->with('message', 'Đã xoá sản phẩm thành công');
    }

    //edit product
    public function editProduct($product_id){
        $all_category = Category::all();
        $all_brand = Brand::all();
        $all_product = Product::where('product_id',$product_id)->get();
        return view('admin.edit_product',compact('all_product','all_category','all_brand'));
    }

    //update product
    public function updateProduct(ProductRequest $request, $product_id, $product_image){
        $product = Product::find($product_id);
        $product->product_name = $request->product_name;
        $product->cat_id = $request->product_category;
        $product->brand_id = $request->product_brand;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_desc = $request->product_desc;
        $product->product_content = $request->product_content;
        $product->product_status = $request->product_status;


        //Xử lý ảnh
        $get_image = $request->file('product_image');
        if(isset($get_image)){
            $path = 'public/backend/uploads/product/'.$product_image;
            File::delete($path);
            $fileExtension = $get_image->getClientOriginalExtension();
            $fileName = $get_image->getClientOriginalName();
            $fileRealName = current(explode('.',$fileName));
            $product->product_image = $fileRealName.rand(0,99).'.'.$fileExtension;
            $get_image->move('public/backend/uploads/product/',$product->product_image);
        } 
        $result = $product->save();
        if($result){
            return redirect()->back()->with('success','Đã cập nhật sản phẩm thành công');
        }
        
    }

    ///////Front end

    public function showProductDetails($product_id, $brand_id, $cat_id){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $product = Product::find($product_id);
        $true_brand = Brand::find($brand_id);
        $related_product = Product::where('cat_id',$cat_id)->get();
        return view('pages.product.product_details',compact('category','brand','product','true_brand','related_product'));
    }
}