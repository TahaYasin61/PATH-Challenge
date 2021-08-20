<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['order_code','user_id','user_address','shipping_date'];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class,'order_id','id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
