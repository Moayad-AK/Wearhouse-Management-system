<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductInStorage extends Model
{
    use HasFactory;

    protected $table = 'product_in_storages';
    protected $primaryKey = ['storage_id', 'product_id'];
    protected $fillable = [
        'price_in',
        'price_out',
        'supplier_id',
        'quantity',
        'storage_id',
        'product_id'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    public function storages(): HasMany
    {
        return $this->hasMany(Storage::class, 'storage_id');
    }
}
