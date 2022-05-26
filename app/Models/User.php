<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticateContract;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App\Models
 */
class User extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'facebook_url',
        'profile_img_url'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'product_id');
    }

    public function order_detales(){
        return $this->hasMany(Order_detales::class,'product_id')->orderBy('date');
    }

 }
