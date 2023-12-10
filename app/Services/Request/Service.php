<?php

namespace App\Services\Request;
use App\Models\Request;
class Service
{
    public function store(array $data) : Request|bool
    {
        $data['status'] = 'Active';
        return Request::create($data);
    }
    public function update($request, $data)
    {
        $data['status'] = 'Resolved';
        $request->update($data);
        return $request->fresh();
    }
}
