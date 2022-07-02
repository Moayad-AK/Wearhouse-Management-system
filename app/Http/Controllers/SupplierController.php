<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\SupplierDestroyRequest;
use App\Http\Requests\Supplier\SupplierIndexRequest;
use App\Http\Requests\Supplier\SupplierShowRequest;
use App\Http\Requests\Supplier\SupplierStoreRequest;
use App\Http\Requests\Supplier\SupplierUpdateRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends APIController
{
    public function __construct()
    {
        parent::__construct(Supplier::class, SupplierResource::class, $this->getRequests());
    }

    public function getRequests()
    {
        return [
            'index' => SupplierIndexRequest::class,
            'store' => SupplierStoreRequest::class,
            'update' => SupplierUpdateRequest::class,
            'show' => SupplierShowRequest::class,
            'destroy' => SupplierDestroyRequest::class,
        ];    }
}
