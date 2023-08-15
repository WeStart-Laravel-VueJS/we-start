<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $lang = $request->header('Accept-Language');

        if(!in_array($lang, ['en', 'ar', 'fr'])) {
            $lang = 'en';
        }

        return [
            'id' => $this->id,
            'name' => $this->{'name_'.$lang},
            'image' => asset($this->image->path),
            'services' => ServiceResource::collection($this->services),
            'link' => url('/api/v1/category/'. $this->slug)
        ];
    }
}
