<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $primaryKey="id";
    public $timestamps=true;
    protected $fillable=[
        "name",
        "price",
        "description",
        "exp_date",
        "img_url",
        "quantity",
        "views",
        "category_id",
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function storage(){
        return $this->belongsTo(Storage::class, 'storage_id');
    }

    public function order_detales(){
        return $this->hasOne(Order_detales::class,'product_id')->orderBy('date');
    }
}
