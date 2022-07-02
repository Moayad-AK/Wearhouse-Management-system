<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Supplier extends Model
{
    use HasFactory;

    protected $table = "supplier";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'email'
    ];

    public function storages(): BelongsToMany
    {
        return $this->belongsToMany(Storage::class, 'product_in_storages', 'storage_id', 'id');
    }
}
