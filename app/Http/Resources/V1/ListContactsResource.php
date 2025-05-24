<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\ShowContactResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ListContactsResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => 'Ok',
            'message' => 'Contacts read successfully',
            'data' => ShowContactResource::collection($this->collection),
        ];
    }
}
