<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

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
}