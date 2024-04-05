<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{
    //review page
    function reviewPage(){
        $review = Reviews::select('reviews.*','users.name as user_name','users.image as user_image')
                ->leftJoin('users','reviews.user_id','users.id')
                ->orderBy('created_at','desc')
                ->get();
        return view('user.review.reviews',compact('review'));
    }

    function review(Request $request){
         $data = $this->reviewData($request);
        Reviews::create($data);

            return response()->json([
                'status' => 'success',
            ]);
    }

    //review data
    private function reviewData($request){
        return [
            'user_id' => $request->userId,
            'rating' => $request->rating,
            'review_text' => $request->description,
        ];
    }
}