<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Storage extends Model
{
    use HasFactory;
    protected $table = "storages";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'storage_size',
        'description',
        'address'
    ];

    public function product_in_storages(): HasMany
    {
        return $this->hasMany(ProductInStorage::class, 'storage_id');
    }
}
