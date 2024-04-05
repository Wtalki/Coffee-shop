<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    //admin panel user List
    function list(){
        $admin = User::where('role', 'admin')->get();
        return view('admin.account.list',compact('admin'));
    }
    //change user role
    function changeRole(Request $request){
        $data = [
            'role' => $request->changeRole
        ];
        User::where('id', $request->userId)->update($data);
        return response()->json([
            'status' => 'success'
        ]);
    }
    //admin account details
    function accountDetails(){
        return view('admin.account.details');
    }
    function accountEditPage(){
        return view('admin.account.edit');
    }
    //account edit
    function accountEdit(Request $request){
        $this->validateAccount($request);
        $data = $this->updateAccount($request);
        if($request->hasFile('image')){
            $oldImage = User::where('id', Auth::user()->id)->first();
            $oldImage = $oldImage['image'];
            if($oldImage != null){
                Storage::delete('public/' . $oldImage);
            }
            $file = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $file);
            $data['image'] = $file;
        }
        User::where('id',Auth::user()->id)->update($data);
        return to_route('account#details')->with(['updateSuccess' => 'Account update Success']);
    }

    // admin password changepage
    function passwordChange(){
        return view('admin.account.password_change');
    }
    //admin password change
    function changePassword(Request $request){
        $this->changePasswordValidation($request);
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


    //admin account delete
    function delete($id){
        User::where('id', $id)->delete();
        return back();
    }

    //account edit validation
    private function validateAccount($request){
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp|file'
        ])->validate();
    }

    //account update data
    private function updateAccount($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
    }

    //password change validation
    private function changePasswordValidation($request){
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'newConfirmPassword' => 'required|same:newPassword',
        ])->validate();
    }
}