<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
      //direct dashboard
 //login page
    function loginPage(){
        return view('user.userLogin');
    }
    function registerPage(){
        return view('user.userRegister');
    }

    function dashboard(){
        if(Auth::user()->role == 'admin'){
            return to_route('admin#dashboard');
        }
        return to_route('user#main');
    }
}