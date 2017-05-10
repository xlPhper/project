<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';

    public function goods()
    {
        return $this->belongsTo('App\Models\Goods');
    }

    public function orderPay()
    {
        return $this->belongsTo('App\Models\OrderPay','id')->select('id','sn');
    }
}
