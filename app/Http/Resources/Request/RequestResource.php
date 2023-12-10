<?php

namespace App\Http\Resources\Request;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            'comment' => $this->comment,
            'status' => $this->status
        ];
    }
}
