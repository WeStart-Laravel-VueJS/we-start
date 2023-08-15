<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name" => $this->name,
            "slug" => $this->slug,
            "image" => asset($this->image->path),
            "price" => $this->price,
            "description" => $this->description,
            "discount" => $this->discount,
            "discount_type" => $this->discount_type,
            "category" => $this->category,
            "user" => $this->user,
        ];
    }
}
