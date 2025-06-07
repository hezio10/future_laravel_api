<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
			"name" =>  $this->name,
			"notes" =>  $this->notes,
			"birthdate" => $this->birthdate,
			"image"=> $this->image,
			"status"=> $this->status,
			"address" =>  $this->address,
			"company" => $this->company,
			"created_at" => $this->created_at,
			"updated_at" => $this->updated_at
        ];
    }
}
