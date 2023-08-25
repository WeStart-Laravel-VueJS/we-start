<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $related = $this->category->services()->where('id', '!=', $this->id)->whereBetween('price', [$this->price - 100 , $this->price + 100])->latest('id')->limit(4)->get();

        if($related->count() < 4) {
            $related = $this->category->services()->where('id', '!=', $this->id)->latest('id')->limit(4)->get();
        }

        return [
            "id" => $this->id,
            "name" => $this->name,
            "name_trans" => $this->name_trans,
            "slug" => $this->slug,
            "image" => asset($this->image->path),
            "gallery" => ImageResource::collection($this->images),
            "price" => $this->price,
            "description" => $this->description,
            "description_trans" => $this->description_trans,
            "discount" => $this->discount,
            "discount_type" => $this->discount_type,
            "status" => $this->status,
            "category" => $this->category,
            "user" => $this->user,
            "related_services" => $related
        ];
    }
}
