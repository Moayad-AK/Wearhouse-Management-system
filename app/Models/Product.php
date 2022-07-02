<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "name",
        "description",
        "category_id",
        "size",
        "image",

    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function product_in_storages(): HasMany
    {
        return $this->hasMany(ProductInStorage::class, 'product_id');
    }

}
