<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DB;
use Session;


class UserController extends Controller
{
    //
    public function RegisterForm(){
        return view('auth');
    }
    public function Register(Request $req){
        $this->validate($req, [
            'firstname'=> 'required',
            'lastname'=> 'required' ,
            'adress'=> 'required' , 
            'phone' => 'required|max:10' ,
            'email' => 'required|email|unique:users' ,
            'password' => 'required' ,
            'type'=> 'required' 
        ]);
        User::create($req->all());
        return back()->with('success','Data saved successfully, You have to login');
    }

    public function LoginForm(){
        return view('login');
    }
    public function Login(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email','=',$req->email)->first();
        if($user){
            if($req->password==$user->password){
                $req->session()->put('loginId',$user->_id);
                if($user->type=="Client"){
                    return redirect('dashboard/menu');
                }else if($user->type=="Admin"){
                    return redirect('admin-dashboard');
                }
            }else{
                return back()->with('fail','Password incorrect');
            }
        }else{
            return back()->with('fail','Email has not registered');
        }
    }

    public function Logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            Session::forget('loginId');
        }
        return redirect('login');
    }
}
