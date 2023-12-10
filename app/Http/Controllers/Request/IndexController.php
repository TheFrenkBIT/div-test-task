<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Filters\RequestFilter;
use App\Http\Requests\Request\FilterRequest;
use App\Http\Resources\Request\RequestResource;
use App\Models\Request;
class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 5;
        $filter = app()->make(RequestFilter::class, ['queryParams' => array_filter($data)]);
        $requests = Request::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        return RequestResource::collection($requests);
    }
}
