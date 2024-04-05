<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //admin dashboard
    function adminDashboard(){
        return view('admin.home.home');
    }

    //admin panel user List
    function userList(){
        $user = User::where('role', 'user')->get();
        return view('admin.user.list',compact('user'));
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


}