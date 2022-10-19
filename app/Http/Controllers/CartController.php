<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\User;
use App\Models\Meal;
use Session;
use DB;

class CartController extends Controller
{
    //
    public function AddToCart(Request $req){
        $req->validate([
            'ClientId',
            'mealId',
            'title',
            'price'
        ]);
        Cart::create($req->all());
        return back()->with('status','Add to Cart Successfully');
    }

    public function MyCart(){
        if(Session::has('loginId')){
            $cart = Cart::where('ClientId',Session::get('loginId'))->get();
            $user = User::where('_id',Session::get('loginId'))->first();
        }
        return view('ClientDashs.MyCart',compact('cart','user'));
    }

    public function Cancel($id){
        DB::table('carts')->where('_id',$id)->delete();
        return back()->with('status','Canceled Successfully');
    }
}
