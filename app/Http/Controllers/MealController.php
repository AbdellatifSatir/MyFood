<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Meal;
use App\Models\User;
use Session;
use DB;

class MealController extends Controller
{
    //
    public function AddMeal(Request $req){
        $req->validate([
            'title'=> 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required',
            'price' => 'required|max:3'
        ]);
        /*Meal::create($req->all());
        return back()->with('success','Added Successfully');*/
        $meal = new Meal;
        $meal->title = $req->input('title');
        $meal->description = $req->input('description');
        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $org = $file->getClientOriginalName();
            $filename = time() .'_'. $org ;
            $file->move('uploads/images/',$filename);
            $meal->image = $filename;
        }
        $meal->category = $req->input('category');
        $meal->price = $req->input('price');
        $meal->save();
        return back()->with('success','Added Successfully');
    }

    public function MealList(){
        if(Session::has('loginId')){
            $meals= DB::table('meals')->get();
            $user= User::where('_id','=',Session::get('loginId'))->first();
        }
        return view('AdminDashs.MealList',compact('meals','user'));
    }

    public function Delete($id){
        DB::table('meals')->where('_id',$id)->delete();
        return back()->with('success','Meal Deleted Successfully');
    }

    public function Edit($id){
        $meal = Meal::find($id);
        return view('AdminDashs.Edit',compact('meal'));
    }
    public function Update(Request $req,$id){
        $req->validate([
            'title'=> 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required',
            'price' => 'required|max:3'
        ]);
        $meal = Meal::find($id);
        $meal->title = $req->input('title');
        $meal->description = $req->input('description');
        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $org = $file->getClientOriginalName();
            $filename = time() .'_'. $org ;
            $file->move('uploads/images/',$filename);
            $meal->image = $filename;
        }
        $meal->category = $req->input('category');
        $meal->price = $req->input('price');
        $meal->update();
        return redirect('/admin-dashboard/meal-list')->with('status','Meal Updated Successfully');
    }


}
