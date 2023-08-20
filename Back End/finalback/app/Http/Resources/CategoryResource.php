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

        $path = asset('images/no-image-available.png');
        if($this->image->path && file_exists(public_path($this->image->path))) {
            $path = asset($this->image->path);
        }

        return [
            'id' => $this->id,
            'name' => $this->{'name_'.$lang},
            'slug' => $this->slug,
            'image' => $path,
            'services' => ServiceResource::collection($this->services),
            'link' => url('/api/v1/category/'. $this->slug)
        ];
    }
}
