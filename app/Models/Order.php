<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        "quantity"
    ];

    public function order_detales(){
        return $this->belongsTo(Order_detales::class,'order_detales_id');
    }
}
