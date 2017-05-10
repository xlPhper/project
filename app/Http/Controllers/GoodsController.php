<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Goods;
use App\Models\Order;
use Illuminate\Support\Facades\Redis;

class GoodsController extends Controller
{
    //
    public function index()
    {
        $res=Goods::find(1);
        $res->intro=9988;
        return $res;
    }

    public function show()
    {
        $str='aaaaaaaaaa';
        $key='redis';
        Redis::set($key,$str);
        print_r(Redis::keys('*'));
    }

    public function asyn()
    {

    }
}
