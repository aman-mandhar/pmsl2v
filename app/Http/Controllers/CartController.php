<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\Stock;
use App\Models\Transfer;
use App\Models\User;
use App\Models\Sales;
use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart; // Add this line
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // To add an item to the cart
    public function addToCart(Request $request)
    {
            $stock = Stock::find($request->stock_id);
            $cart = Session::get('cart', []);
            $cart[$stock->id] = [
                'id' => $stock->id,
                'user_id' => $stock->item->name,
                'quantity' => $request->quantity,
                'measure' => $request->measure,
                'price' => $stock->price,
            ];
            Session::put('cart', $cart);
            return redirect()->back()->with('success', 'Item added to cart successfully');
    }
        

    // To view the cart
    public function viewCart()
    {
        $cart = Session::get('cart', []);
        return view('cart', ['cart' => $cart]);
    }
}