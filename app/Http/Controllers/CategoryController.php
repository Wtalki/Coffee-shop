<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //category list page
    function categoryList(){
        $category=Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.list',compact('category'));
    }
    //category creat page
    function categoryCreatePage(){
        return view('admin.category.createPage');
    }
    //category create
    function categoryCreate(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->categoryGetData($request);
        Category::create($data);
        return back()->with(['success' => 'category created successfully']);
    }
    //category delete
    function categoryDelete($id){
        Category::where('id', $id)->delete();
        return back();
    }
    //category edit page
    function categoryEditPage($id)
    {
        $category =Category::where('id', $id)->first();
        return view('admin.category.edit',compact('category'));
    }

    //category edit
    function categoryEdit(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->categoryGetData($request);
        Category::where('id', $request->id)->update($data);
        return to_route('category#list')->with(['success'=> 'Category edit successfully']);
    }
    //category validation check
    private function categoryValidationCheck($request){
        Validator::make($request->all(), [
            'category' => 'required|unique:categories,name,'.$request->id,
        ])->validate();
    }

    //category data
    private function categoryGetData($request)
    {
        return [
            'name' => $request->category,
        ];
    }

}