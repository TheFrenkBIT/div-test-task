<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\StoreRequest;
use App\Http\Resources\Request\RequestResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models;
class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $request = $this->service->store($data);
        return $request instanceof Models\Request ? new RequestResource($request) : $request;
    }
}
