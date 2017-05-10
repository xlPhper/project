<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class IndexController extends Controller
{
    public function index()
    {
        $res=DB::table('category')->where('pid',0)->get();
        $cate=[];
        print_r($res);exit;
    }

    public function category()
    {
        return view('index.category');
    }

    public function cate()
    {
        $res=DB::table('category')->where('pid',0)->get();
        $response['category']=$res;
        $cate=[];
        foreach($res as $key =>$val){
            $cate[$val->name]=DB::table('category')->where('pid',$val->id)->get();
        }
//        print_r($cate);exit;
        $response['category'][]=$cate;
        return response($response);
    }
    public function val(Request $request)
    {
        $id=$request->input('id');
        if(!empty($id)){
            echo 'success';
        }else{
            echo 'failed';
        }
    }


}
