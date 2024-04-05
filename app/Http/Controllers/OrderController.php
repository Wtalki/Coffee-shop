<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //list page
    function orderListPage(){
        $order = Order::where('user_id',Auth::user()->id)->get();
        return view('user.menu.orderList',compact('order'));
    }
    //admin order
    function order(){
       $order= Order::select('orders.*','users.name as user_name')
                ->leftJoin('users','orders.user_id','users.id')
                ->orderBy('orders.created_at','desc')->get();
        return view('admin.product.order', compact('order'));
    }

    //admin order status
    function orderStatus(Request $request){
        Order::where('id', $request->userId)->update([
            'status' => $request->changeStatus
        ]);
    }
    //cash function
    function cash(){
        $category = Category::get();
        $cart = Cart::get();
        $product = Product::get();
        return view('user.menu.cash',compact('cart','category','product'));
    }
    //order details
    function orderDetails($orderCode){
        $orderList = OrderItem::select('order_items.*','products.name as product_name','products.image as product_image','users.name as user_name')
                    ->join('products','order_items.product_id','products.id')
                    ->join('users','order_items.user_id','users.id')
                    ->where('order_items.order_code',$orderCode)->get();
        // dd($orderList->toArray());
        return view('admin.product.order_details',compact('orderList'));
    }
}