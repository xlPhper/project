<?php

use App\Models\Groupon;
use App\Models\Order;
use App\Models\OrderPay;
use App\Models\TaskQueue;
use App\Models\UserRebate;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app=env('app.version');

Route::group(['prefix'=>'php'],function(){
    Route::get('/','IndexController@index');
    Route::get('/category','IndexController@category');
    Route::get('/cate','IndexController@cate');
    Route::get('/test','MixtureController@index');
    Route::get('/goods','GoodsController@index');
    Route::get('/show','GoodsController@show');
    Route::get('/asyn','GoodsController@asyn');
});

//登录
Route::get('/login','admin\LoginController@index');
Route::get('/register','admin\LoginController@register');

Route::group(['middleware'=>'xielei'],function(){
    Route::post('/login','admin\LoginController@login');
    Route::get('/home','admin\IndexController@index');
});
