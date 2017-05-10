<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Redis;

class MixtureController extends Controller
{

    private $redis;

    public function __construct()
    {
        //
    }

    public function index()
    {

        $data='{
  "code": 0,
  "msg": "操作成功",
  "data": {
    "address": {
      "id": 37,
      "province": 4,
      "city": 52132,
      "district": 113,
      "name": "孙秀芳",
      "mobile": "15988865122",
      "address": "过会的很好",
      "idcard_no": "",
      "is_first": 1,
      "idcard_valid": 0,
      "province_name": "重庆",
      "city_name": "重庆市",
      "district_name": "万州区",
      "full_address": "重庆重庆市万州区",
      "idcard_encrypt": "********",
      "idcard_img_up": null,
      "idcard_img_down": null
    },
    "region": {
      "province": [
        {
          "id": 1,
          "name": "北京",
          "is_selected": 0
        },
        {
          "id": 2,
          "name": "上海",
          "is_selected": 0
        },
        {
          "id": 3,
          "name": "天津",
          "is_selected": 0
        },
        {
          "id": 4,
          "name": "重庆",
          "is_selected": 1
        },
        {
          "id": 5,
          "name": "河北",
          "is_selected": 0
        },
        {
          "id": 6,
          "name": "山西",
          "is_selected": 0
        },
        {
          "id": 7,
          "name": "河南",
          "is_selected": 0
        },
        {
          "id": 8,
          "name": "辽宁",
          "is_selected": 0
        },
        {
          "id": 9,
          "name": "吉林",
          "is_selected": 0
        },
        {
          "id": 10,
          "name": "黑龙江",
          "is_selected": 0
        },
        {
          "id": 11,
          "name": "内蒙古",
          "is_selected": 0
        },
        {
          "id": 12,
          "name": "江苏",
          "is_selected": 0
        },
        {
          "id": 13,
          "name": "山东",
          "is_selected": 0
        },
        {
          "id": 14,
          "name": "安徽",
          "is_selected": 0
        },
        {
          "id": 15,
          "name": "浙江",
          "is_selected": 0
        },
        {
          "id": 16,
          "name": "福建",
          "is_selected": 0
        },
        {
          "id": 17,
          "name": "湖北",
          "is_selected": 0
        },
        {
          "id": 18,
          "name": "湖南",
          "is_selected": 0
        },
        {
          "id": 19,
          "name": "广东",
          "is_selected": 0
        },
        {
          "id": 20,
          "name": "广西",
          "is_selected": 0
        },
        {
          "id": 21,
          "name": "江西",
          "is_selected": 0
        },
        {
          "id": 22,
          "name": "四川",
          "is_selected": 0
        },
        {
          "id": 23,
          "name": "海南",
          "is_selected": 0
        },
        {
          "id": 24,
          "name": "贵州",
          "is_selected": 0
        },
        {
          "id": 25,
          "name": "云南",
          "is_selected": 0
        },
        {
          "id": 26,
          "name": "西藏",
          "is_selected": 0
        },
        {
          "id": 27,
          "name": "陕西",
          "is_selected": 0
        },
        {
          "id": 28,
          "name": "甘肃",
          "is_selected": 0
        },
        {
          "id": 29,
          "name": "青海",
          "is_selected": 0
        },
        {
          "id": 30,
          "name": "宁夏",
          "is_selected": 0
        },
        {
          "id": 31,
          "name": "新疆",
          "is_selected": 0
        },
        {
          "id": 32,
          "name": "台湾",
          "is_selected": 0
        },
        {
          "id": 42,
          "name": "香港",
          "is_selected": 0
        },
        {
          "id": 43,
          "name": "澳门",
          "is_selected": 0
        },
        {
          "id": 84,
          "name": "钓鱼岛",
          "is_selected": 0
        }
      ],
      "city": [
        {
          "id": 52132,
          "name": "重庆市",
          "is_selected": 1
        }
      ],
      "district": [
        {
          "id": 113,
          "name": "万州区",
          "is_selected": 1
        },
        {
          "id": 114,
          "name": "涪陵区",
          "is_selected": 0
        },
        {
          "id": 115,
          "name": "梁平县",
          "is_selected": 0
        },
        {
          "id": 119,
          "name": "南川区",
          "is_selected": 0
        },
        {
          "id": 123,
          "name": "潼南县",
          "is_selected": 0
        },
        {
          "id": 126,
          "name": "大足区",
          "is_selected": 0
        },
        {
          "id": 128,
          "name": "黔江区",
          "is_selected": 0
        },
        {
          "id": 129,
          "name": "武隆县",
          "is_selected": 0
        },
        {
          "id": 130,
          "name": "丰都县",
          "is_selected": 0
        },
        {
          "id": 131,
          "name": "奉节县",
          "is_selected": 0
        },
        {
          "id": 132,
          "name": "开县",
          "is_selected": 0
        },
        {
          "id": 133,
          "name": "云阳县",
          "is_selected": 0
        },
        {
          "id": 134,
          "name": "忠县",
          "is_selected": 0
        },
        {
          "id": 135,
          "name": "巫溪县",
          "is_selected": 0
        },
        {
          "id": 136,
          "name": "巫山县",
          "is_selected": 0
        },
        {
          "id": 137,
          "name": "石柱县",
          "is_selected": 0
        },
        {
          "id": 138,
          "name": "彭水县",
          "is_selected": 0
        },
        {
          "id": 139,
          "name": "垫江县",
          "is_selected": 0
        },
        {
          "id": 140,
          "name": "酉阳县",
          "is_selected": 0
        },
        {
          "id": 141,
          "name": "秀山县",
          "is_selected": 0
        },
        {
          "id": 4164,
          "name": "城口县",
          "is_selected": 0
        },
        {
          "id": 48131,
          "name": "璧山县",
          "is_selected": 0
        },
        {
          "id": 48132,
          "name": "荣昌县",
          "is_selected": 0
        },
        {
          "id": 48133,
          "name": "铜梁县",
          "is_selected": 0
        },
        {
          "id": 48201,
          "name": "合川区",
          "is_selected": 0
        },
        {
          "id": 48202,
          "name": "巴南区",
          "is_selected": 0
        },
        {
          "id": 48203,
          "name": "北碚区",
          "is_selected": 0
        },
        {
          "id": 48204,
          "name": "江津区",
          "is_selected": 0
        },
        {
          "id": 48205,
          "name": "渝北区",
          "is_selected": 0
        },
        {
          "id": 48206,
          "name": "长寿区",
          "is_selected": 0
        },
        {
          "id": 48207,
          "name": "永川区",
          "is_selected": 0
        },
        {
          "id": 50950,
          "name": "江北区",
          "is_selected": 0
        },
        {
          "id": 50951,
          "name": "南岸区",
          "is_selected": 0
        },
        {
          "id": 50952,
          "name": "九龙坡区",
          "is_selected": 0
        },
        {
          "id": 50953,
          "name": "沙坪坝区",
          "is_selected": 0
        },
        {
          "id": 50954,
          "name": "大渡口区",
          "is_selected": 0
        },
        {
          "id": 50995,
          "name": "綦江区",
          "is_selected": 0
        },
        {
          "id": 51026,
          "name": "渝中区",
          "is_selected": 0
        },
        {
          "id": 51027,
          "name": "高新区",
          "is_selected": 0
        },
        {
          "id": 51028,
          "name": "北部新区",
          "is_selected": 0
        }
      ]
    }
  }
}';

        $res=$data;

        $key = 'redis-key';

        if($res){
            //将用户名存储到Redis中
            Redis::hset('myhash',$key,$res);
        }

      //判断指定键是否存在
        if(Redis::exists($key)){
            //根据键名获取键值
            dd(Redis::hget('myhash',$key));
        }
    }
}
