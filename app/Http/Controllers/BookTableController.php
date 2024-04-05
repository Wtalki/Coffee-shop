<?php

namespace App\Http\Controllers;

use App\Models\BookTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookTableController extends Controller
{
   //appointment
    function appointment(Request $request){
        $data = [
            'name' => $request->userName,
            'date' => $request->Date,
            'time' => $request->Time,
            'phone' => $request->Phone,
            'description' => $request->description
        ];
        BookTable::create($data);
            return response()->json([
            'status'=>'success',
        ]);

    }

    //admin booking list
    function bookingList(){
        $booking = BookTable::orderBy('created_at','desc')->get();
        return view('admin.booking.booking',compact('booking'));
    }

    // booking change status
    function bookingStatus(Request $request){
        BookTable::where('id', $request->userId)->update([
            'status' => $request->changeStatus
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
}