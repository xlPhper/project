<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{

    protected $table='goods';

    //属性类型转换
    protected $casts=[
        'shipping_local'=>'boolean',
    ];

    //隐藏属性
    protected $hidden=[
        'name'
    ];

    //关闭自动托管时间戳
    public $timestamps=false;

    //添加属性
    protected $appends=[
        'test_xl'
    ];
    //对应添加属性
    public function getTestXlAttribute()
    {
        return '添加字段';
    }

    //访问器
    public function getNoticeAttribute($value)
    {
        return mb_substr($value,2,5);
    }

    //修改器
    public function setIntroAttribute($value)
    {
        return $this->attributes['intro']=$value.'1111111111111111111111111';
    }

}
