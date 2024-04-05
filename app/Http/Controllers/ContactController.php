<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    //contact Page

    function contactPage(){
        return view('user.service.contact');
    }

    //contact
    function contact(Request $request){
        $this->contactValidationCheck($request);
        $data = $this->contactData($request);
        Contact::create($data);
        return back()->with(['success' => 'thanks for contact']);
    }

    // admin contact list
    function contactList(){
        $contact = Contact::orderBy('created_at','desc')->get();
        return view('admin.home.contact',compact('contact'));
    }
    function contactDelete($id){
        Contact::where('id', $id)->delete();
        return back();
    }

    private function contactValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ])->validate();
    }

    private function contactData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
    }
}