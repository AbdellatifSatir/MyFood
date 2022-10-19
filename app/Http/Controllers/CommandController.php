<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Commande;
use App\Models\User;
use Session;
use DB;

class CommandController extends Controller
{
    //
    public function OrderNow(Request $req){
        $req->validate([
            'mealId',
            'ClientId',
            'ClientName',
            'title',
            'quantity',
            'total',
            'address',
            'note',
            'status'
        ]);
        Commande::create($req->all());
        return back()->with('status','Your Order placed successfully');
    }

    public function OrdersList(){
        if(Session::has('loginId')){
            $orders = DB::table('commandes')->get();
        }
        return view('AdminDashs.Orders',compact('orders'));
    }

    public function Update(Request $req,$id){
        $order = Commande::find($id);
        //$order->ClientName = $req->input('ClientName');
        $order->title = $req->input('title');
        $order->quantity = $req->input('quantity');
        $order->total = $req->input('total');
        $order->address = $req->input('address');
        $order->note = $req->input('note');
        $order->status = $req->input('status');
        $order->update();
        return back()->with('success','Order Updated Successfully');
    }

    public function MyCommands(){
        if(Session::has('loginId')){
            $mycmd = Commande::where('ClientId','=',Session::get('loginId'))->get();
            $user = User::where('_id','=',Session::get('loginId'))->first();
        }
        return view('ClientDashs.MyCommands',compact('mycmd','user'));
    }

    public function CancelOrder($id){
        DB::table('commandes')->where('_id',$id)->delete();
        return back()->with('status','Canceled Successfully');
    }
}
