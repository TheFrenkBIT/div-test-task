<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Filters\RequestFilter;
use App\Http\Requests\Request\UpdateRequest;
use App\Http\Resources\Request\RequestResource;
use App\Mail\AnswerEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $requestData, \App\Models\Request $request)
    {
        $data = $requestData->validated();
        $request = $this->service->update($request, $data);
        if ($request instanceof \App\Models\Request)
        {
            $this->sendMessage($request);
            return new RequestResource($request);
        }
        return $request;
    }
    private function sendMessage($request)
    {
        Mail::to($request->email)->send(new AnswerEmail($request));
    }
}
