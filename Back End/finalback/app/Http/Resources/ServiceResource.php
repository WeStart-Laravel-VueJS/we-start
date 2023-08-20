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
            "id" => $this->id,
            "name" => $this->name,
            "slug" => $this->slug,
            "image" => asset($this->image->path),
            "gallery" => ImageResource::collection($this->images),
            "price" => $this->price,
            "description" => $this->description,
            "discount" => $this->discount,
            "discount_type" => $this->discount_type,
            "status" => $this->status,
            "category" => $this->category,
            "user" => $this->user,
            "name_trans" => $this->name_trans
        ];
    }
}
