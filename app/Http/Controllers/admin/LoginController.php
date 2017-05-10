<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * 登录首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('login.login',['data'=>'磊哥']);
    }

    /**
     * 注册页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('login.register');
    }

    /**
     * 登录验证页
     * @param Request $request
     */
    public function login(Request $request)
    {
        $username=$request->input('username');
        $password=$request->input('password');
        $user=User::where('username',$username)->where('password',$password)->first();
        if($user){
            return response()->json(['status'=>200,'message'=>'请求成功',null]);
        }else{
            return response()->json(['status'=>401,'message'=>'用户不存在',null]);
        }
    }
}
