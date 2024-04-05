<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    //menu page
    function menuPage(){
        $product = Product::orderBy('created_at','desc')->get();
        $category = Category::get();
        return view('user.menu.menu',compact('product','category'));
    }

    // //function filter
    // function categoryFilter(){
    //     $product = Product::orderBy('created_at','desc')->get();
    //     $category = Category::orderBy('created_at','desc')->get();

    //     $response = [
    //         'product' => $product,
    //         'category' => $category
    //     ];
    //     return response()->json($response,200);

    // }

    //product single page
    function productSinglePage($id){
        $product = Product::where('id', $id)->first();
        $productList = Product::orderBy('created_at','desc')->get();
        $category = Category::get();
        $cart = Cart::get();
        return view('user.menu.single',compact('product','productList','category','cart'));
    }

    //product add cart
    function productAdd(Request $request){
        $data = $this->productCartData($request);
        Cart::create($data);
        return response()->json([
            'status' => 'success'
        ]);
    }

    //cart page
    function productOrderPage(){
        $cart = Cart::select('carts.*','products.name as product_name','products.description as product_description','products.image as product_image','products.price as product_price')
                ->leftJoin('products','carts.product_id','products.id')
                ->orderBy('carts.created_at', 'desc')->get();
        $product = Product::get();
        $category = Category::get();
        return view('user.menu.cart',compact('cart','product','category'));
    }

    // delete current cart
    function deleteCurrentCart(Request $request){
        Cart::where('id', $request->orderId)
            ->where('user_id', Auth::user()->id)
            ->where('product_id', $request->productId)
            ->delete();

    }
    //product order
    function productOrder(Request $request){
        $total = 0;
        foreach($request->all() as $item){
            $data = OrderItem::create([
                'user_id' => $item['userId'],
                'product_id' => $item['productId'],
                'quantity' => $item['qty'],
                'order_code' => $item['orderCode'],
                'total_price' => $item['total']
            ]);
            $total += $data->total_price;
        }
        Cart::where('user_id', Auth::user()->id)->delete();

        Order::create([
            'user_id' => Auth::user()->id,
            'order_code' =>$data->order_code,
            'total_amount' => $total + 3000,
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }
    //product cart data
    private function productCartData($request){
        return [
            'product_id' => $request->productId,
            'user_id' => $request->userId,
            'quantity' => $request->quantityValue
        ];
    }
}