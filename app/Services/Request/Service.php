<?php

namespace App\Services\Request;
use App\Models\Request;
class Service
{
    public function store(array $data) : Request|bool
    {
        return Request::create($data);
    }
}
