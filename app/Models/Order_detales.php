<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detales extends Model
{
    use HasFactory;
    protected $fillable=[
        "deleverd"
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function order(){

        return $this->hasOne(Order::class,'Order_detales_id');
    }
}
