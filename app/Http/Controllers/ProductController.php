<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //product list page
    function productListPage(){
        $product = Product::select('products.*','categories.name as category_name')
                ->leftJoin('categories','products.category_id','categories.id')
                ->orderBy('products.created_at', 'desc')->get();
        return view('admin.product.product_list',compact('product'));
    }

    //product create page
    function productCreatePage(){
        $category = Category::get();
        return view('admin.product.product_create',compact('category'));
    }

    //product create
    function productCreate(Request $request){
        $this->productCreateValidation($request,'create');
        $data = $this->productGetData($request);
        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $fileName);
        $data['image'] = $fileName;

        Product::create($data);
        return to_route('product#listPage')->with(['success' => 'Product created successfully']);

    }

    //product delete
    function productDelete($id){
        Product::where('id', $id)->delete();
        return back();
    }

    //product edit page
    function productEditPage($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::get();
        return view('admin.product.product_edit',compact('product','category'));
    }
    function productEdit(Request $request){
         $this->productCreateValidation($request,'update');
        $product = $this->productGetData($request);
        if($request->hasFile('image')){
            $oldImage = Product::where('id', $request->id)->first();
            $oldImage = $oldImage['image'];

            if($oldImage != null){
                Storage::delete('public/' . $oldImage);
            }

            $newImage = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $newImage);
            $product['image'] = $newImage;
        }

        Product::where('id', $request->id)->update($product);
        return to_route('product#listPage');
    }
    //product details
    function productDetail($id){
        $product = Product::select('products.*','categories.name as category_name')
                    ->leftJoin('categories','products.category_id','categories.id')
                    ->where('products.id', $id)->first();
        return view('admin.product.product_detail',compact('product'));
    }

    // product create validation
    private function productCreateValidation($request,$status){
        $validationRules =
            [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category' => 'required'
            ];
            $validationRules['image'] = $status == 'create' ? 'required|mimes:jpg,jpeg,png|file' : 'mimes:jpg,jpeg,png|file';
        Validator::make($request->all(),$validationRules )->validate();
    }

    //product data
    private function productGetData($request ){
        return [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category,
        ];
    }
}
