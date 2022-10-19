<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){ return view('index'); });
Route::get('/about',function(){ return view('about'); });

Route::get('/autentication','App\Http\Controllers\UserController@RegisterForm')->name('Register')->middleware('AlreadyLoggedIn');
Route::post('/autentication','App\Http\Controllers\UserController@Register');
Route::get('login','App\Http\Controllers\UserController@LoginForm')->name('Login')->middleware('AlreadyLoggedIn');
Route::post('/login','App\Http\Controllers\UserController@Login');
Route::get('/logout','App\Http\Controllers\UserController@Logout')->name('Logout')->middleware('AuthCheck');

Route::get('admin-dashboard',function(){ return view('AdminDashs.AdminDash');});
Route::get('dashboard',function(){ return view('ClientDashs.ClientDash');});

Route::post('/admin-dashboard','App\Http\Controllers\MealController@AddMeal')->name('AddMeal');
Route::get('/admin-dashboard/meal-list','App\Http\Controllers\MealController@MealList')->middleware('AuthCheck');
Route::get('/admin-dashboard/meal-list/{id}','App\Http\Controllers\MealController@Edit')->middleware('AuthCheck');
Route::put('/admin-dashboard/meal-list/update/{id}','App\Http\Controllers\MealController@Update');
Route::get('/admin-dashboard/meal-list/delete/{id}','App\Http\Controllers\MealController@Delete')->name('delete')->middleware('AuthCheck');
Route::get('/admin-dashboard/orders','App\Http\Controllers\CommandController@OrdersList')->middleware('AuthCheck');
Route::put('/admin-dashboard/orders/update/{id}','App\Http\Controllers\CommandController@Update');
Route::get('/admin-dashboard/menu',function(){return view('AdminDashs.Menu');});

//
Route::get('/dashboard/menu',function(){return view('ClientDashs.Menu');});
Route::post('/dashboard/menu','App\Http\Controllers\CartController@AddToCart')->name('AddToCart');
Route::get('/dashboard/mycart','App\Http\Controllers\CartController@MyCart')->middleware('AuthCheck');
Route::get('/dashboard/mycart/cancel/{id}','App\Http\Controllers\CartController@Cancel')->name('Cancel')->middleware('AuthCheck');
Route::post('/dashboard/mycart','App\Http\Controllers\CommandController@OrderNow')->name('OdrerNow');
Route::get('/dashboard/mycommands','App\Http\Controllers\CommandController@MyCommands')->middleware('AuthCheck');
Route::put('/dashboard/mycommands/update/{id}','App\Http\Controllers\CommandController@Update');
Route::get('/dashboard/mycommands/cancel/{id}','App\Http\Controllers\CommandController@CancelOrder')->middleware('AuthCheck');