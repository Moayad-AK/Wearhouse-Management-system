<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storage\StorageDestroyRequest;
use App\Http\Requests\Storage\StorageIndexRequest;
use App\Http\Requests\Storage\StorageShowRequest;
use App\Http\Requests\Storage\StorageStoreRequest;
use App\Http\Requests\Storage\StorageUpdateRequest;
use App\Http\Resources\StorageResource;
use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends APIController
{
    public function __construct()
    {
        parent::__construct(Storage::class, StorageResource::class, $this->getRequests());
    }

    public function getRequests()
    {
        return array(
            'index' => StorageIndexRequest::class,
            'store' => StorageStoreRequest::class,
            'update' => StorageUpdateRequest::class,
            'show' => StorageShowRequest::class,
            'destroy' => StorageDestroyRequest::class,
        );    }
}
