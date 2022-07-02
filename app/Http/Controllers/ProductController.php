<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductDestroyRequest;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Http\Requests\Product\ProductShowRequest;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends APIController
{
    public function __construct()
    {
        parent::__construct(Product::class, ProductResource::class, $this->getRequests());
    }

    public function getRequests()
    {
        return [
            'index' => ProductIndexRequest::class,
            'store' => ProductStoreRequest::class,
            'update' => ProductUpdateRequest::class,
            'show' => ProductShowRequest::class,
            'destroy' => ProductDestroyRequest::class,
        ];
    }
}
