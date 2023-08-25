<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\SingleServiceResource;

class UserActionsController extends BaseController
{
    function services(Request $request) {
        $data = ServiceResource::collection($request->user()->services);
        return $this->message($data, 'Your services', true, 200);
    }

    function services_store(Request $request) {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name_en' => 'required',
            'name_ar' => 'required',
            'price' => 'required',
            'image' => 'required',
            'gallery' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'discount' => 'required',
            'discount_type' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($validator->fails()) {
            return $this->message($validator->errors(), 'Adding Service Failed', false, 500);
        }

        // foreach($request->all() as $key => $val) {
        //     if(str_contains('_en', $key) || str_contains('_ar', $key)) {
        //         unset($_POST[$key]);
        //     }
        // }

        $data = $request->except('image', 'gallery', 'name_en', 'name_ar', 'description_en', 'description_ar');
        $data['name'] = null;
        $data['description'] = null;

        $slug = Str::slug($request->name_en);

        $slug_count = Service::where('slug', 'like', $slug.'%')->count();

        // return $slug_count;
        if($slug_count == 0) {
            $data['slug'] = $slug;
        }else {
            $new_slug = $slug.'-'.($slug_count);
            $slug_count = Service::where('slug', 'like', $new_slug)->count();
            if($slug_count == 0) {
                $data['slug'] = $new_slug;
            }else {
                $data['slug'] = $new_slug.rand(00,99);
            }
        }

        $service = $request->user()->services()->create($data);

        // upload files
        $cover = $request->file('image')->store('images', 'files');
        $service->image()->create([
            'path' => $cover,
            'type' => 'cover'
        ]);

        foreach($request->gallery as $gallery) {
            $path = $gallery->store('images', 'files');
            $service->images()->create([
                'path' => $path,
                'type' => 'gallery'
            ]);
        }

        return $this->message(new ServiceResource($service), 'New Service added');
    }

    function service(Service $service) {

        // $data = new ServiceResource($service);
        // return $data;
        return $this->message(new SingleServiceResource($service), 'Service Found');
    }

    function search(Request $request) {
        // if(is_numeric($request->q)) {
        //     $result = Service::where('price', 'like', '%'.$request->q.'%')->get();
        // }else {
        //     $result = Service::where('name', 'like', '%'.$request->q.'%')->get();
        // }

        $result = Service::where('name', 'like', '%'.$request->q.'%')
        ->orWhere('price', 'like', '%'.$request->q.'%')
        ->get();

        return $this->message(ServiceResource::collection($result), 'Search Result');
    }
}
