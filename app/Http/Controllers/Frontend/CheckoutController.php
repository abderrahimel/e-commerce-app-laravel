<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index(){

        $oldcartitems = Cart::where('user_id', Auth::id())->get();
        foreach($oldcartitems as $item)
        {     // here we will remove all those product that are not available in the stock from the cart
            if(!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()){
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id);
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }
    public function placeorder(Request $request){

        $validator = Validator::make($request->all(), [ 
            'fname' =>'required',
            'lname' =>'required',
            'email' =>'required',
            'phone' =>'required',
            'address1' =>'required',
            'address2' =>'required',
            'city' =>'required',
            'state' =>'required',
            'country' =>'required',
            'pincode' =>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pincode = $request->pincode;
        //  calculate total price
        $total = 0;
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item){
            $total += $prod->products->selling_price;
        }
        $order->total_price = $total;
        $order->tracking_no = 'abderrahim'.rand(1111, 9999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item){
            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id' => $item->prod_id,
                'qty'     => $item->prod_qty,
                'price'   => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            // we will change the quantity that we have in our product   
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1 == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->fname;
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->pincode = $request->pincode;
            $cartitems = Cart::where('user_id', Auth::id())->get();
            Cart::destroy($cartitems);

            return redirect('/')->with('status', "Order placed Successfully");
        }
    }
}