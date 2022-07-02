<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryIndexRequest;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class APIController extends Controller
{
    protected string $model;
    protected string $resource;
    protected array $requests;

    public function __construct($model, $resource, array $requests)
    {
        $this->model = $model;
        $this->resource = $resource;
        $this->requests = $requests;
    }

    abstract public function getRequests();

    public function index(Request $request): JsonResponse
    {
        // validate request
        $request->validate((new $this->requests['index'])->rules());

        $take = $request->input('take', 100);
        $skip = $request->input('skip', 0);

        $bases = ($this->model)::query();

        // pagination
        $bases = $bases->take($take)->skip($skip);

        $bases = $bases->get();

        // transform data shape
        $bases = ($this->resource)::collection($bases);

        return Response()->json($bases, 200);
    }

    public function store(Request $request): JsonResponse
    {
        // validate request
        $request->validate((new $this->requests['store'])->rules());

        // create new record and save it
        $base = new ($this->model)($request->all());
        $base->save();

        // transform data shape
        $base = new ($this->resource)($base);

        return Response()->json($base, 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate((new $this->requests['update'])->rules());

        $base = ($this->model)::query()->findOrFail($id);
        $base->update($request->all());

        $base = new $this->resource($base);
        return Response()->json($base, 200);
    }

    public function show(Request $request, $id): JsonResponse
    {
        $request->validate((new $this->requests['show'])->rules());
        $base = ($this->model)::query()->findOrFail($id);
        $base = new $this->resource($base);

        return Response()->json($base, 200);
    }

    public function destroy(Request $request, $id): JsonResponse
    {
        $request->validate((new $this->requests['destroy'])->rules());
        $base = ($this->model)::query()->findOrFail($id);
        $old = $base;
        $base->delete();

        $old = new $this->resource($old);

        return Response()->json($old, 200);
    }
}
