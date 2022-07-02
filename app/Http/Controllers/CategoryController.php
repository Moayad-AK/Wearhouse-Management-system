<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryDestroyRequest;
use App\Http\Requests\Category\CategoryIndexRequest;
use App\Http\Requests\Category\CategoryShowRequest;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends APIController
{
    public function getRequests(): array
    {
        return [
            'index' => CategoryIndexRequest::class,
            'store' => CategoryStoreRequest::class,
            'update' => CategoryUpdateRequest::class,
            'show' => CategoryShowRequest::class,
            'destroy' => CategoryDestroyRequest::class,
        ];
    }

    public function __construct()
    {
        parent::__construct(Category::class, CategoryResource::class, $this->getRequests());
    }
}
