<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    //user account details
    function accountDetails(){
        return view('user.account.details');
    }

    //user account edit
    function accountEdit(){
        return view('user.account.edit');
    }

    //user account update
    function accountUpdate(Request $request){
        $this->accountValidationCheck($request);
        $data = $this->accountUpdatData($request);

        if($request->hasFile('postImage')){
            $dbImage = User::where('id', Auth::user()->id)->first();
            $dbImage = $dbImage['image'];
            if($dbImage != null){
                Storage::delete('public/' . $dbImage);
            }
            $file = uniqid() . $request->file('postImage')->getClientOriginalName();
            $request->file('postImage')->storeAs('public', $file);
            $data['image'] = $file;
        }
        User::where('id', Auth::user()->id)->update($data);
        return to_route('user#accountDetails')->with(['updateSuccess' => 'Account Update Success']);
    }

    //user password change page
    function passwordChangePage(){
        return view('user.account.passwordChange');
    }
    //password change
    function passwordChange(Request $request){
        // $this->passwordChangeCheck($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHash = $user->password;
        if(Hash::check($request->oldPassword, $dbHash)){
            $data = [
                'password' => Hash::make($request->newPassword)
            ];

            User::where('id', Auth::user()->id)->update($data);

            return back()->with(['success' => 'password changed successfully']);
        }
        return back()->with(['error' => 'the old password do not match']);

    }

    //user page
    function userHome(){
        $review = Reviews::select('reviews.*','users.name as user_name','users.image as user_image')
                ->leftJoin('users','reviews.user_id','users.id')
                ->orderBy('created_at','desc')
                ->paginate(5);

        $product = Product::orderBy('created_at', 'desc')->paginate(4);
        return view('user.main.home',compact('review','product'));
    }

    // service page
    function userService(){
        return view('user.service.service');
    }
    function userAbout(){
         $review = Reviews::select('reviews.*','users.name as user_name','users.image as user_image')
                ->leftJoin('users','reviews.user_id','users.id')
                ->orderBy('created_at','desc')
                ->paginate(5);
        $product = Product::orderBy('created_at','desc')->paginate(4);
        return view('user.service.about',compact('review','product'));
    }

    //view count
    function userView(Request $request){
        $product = Product::where('id', $request->productId)->first();
        $viewCount = [
            'view_count' => $product->view_count + 1,
        ];
        Product::where('id',$request->productId)->update($viewCount);
    }


    //user account validation check
    private function accountValidationCheck($request){
        Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'postImage' => 'mimes:jpg,jpeg,png,bmp,webp|file',
        ])->validate();
    }
    //user account update



    private function accountUpdatData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ];
    }

    //password change validation
    private function passwordChangeCheck($request){
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'newPasswrdConfirm' => 'required|same:newPassword'
        ])->validate();
    }
}