<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection(Category::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMainCategories(Request $request)
    {
        $category = Category::query();
        // return $request->all();
        if ($request->has('limit')) {
            $category->take($request->limit);
            // return CategoryResource::collection(Category::limit($request->limit)->get());
        }

        if($request->has('search')) {
            $category->where('name', 'like', '%'.$request->search.'%');
            // return CategoryResource::collection(Category::where('name', 'like', '%'.$request->search.'%')->get());
        }

        // return $category->get();

        return CategoryResource::collection($category->get());
    }

    function single(Category $category) {
        return new CategoryResource($category);
    }
}
