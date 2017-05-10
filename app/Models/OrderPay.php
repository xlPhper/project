<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPay extends Model
{
    protected $table='order_pay';

    public function order()
    {
        return $this->belongsTo('App/Models/Oder');
    }
}
