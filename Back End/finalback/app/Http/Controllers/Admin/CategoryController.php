<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::withCount('services')->latest('id')->paginate(10);

        return view('admin.categories.index', compact('categories'));

        // if ($request->ajax()) {
        //     $data = Category::select('*');
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('name', function($row){
        //                     return $row->name_trans;
        //             })
        //             ->addColumn('image', function($row){

        //                     $url = asset($row->image->path);
        //                     $img = "<img width='60' src='$url' alt=''>";

        //                     return $img;
        //             })
        //             ->addColumn('action', function($row){

        //                     $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

        //                     return $btn;
        //             })
        //             ->rawColumns(['action', 'image', 'name'])
        //             ->make(true);
        // }

        // return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->latest('id')->whereNull('parent_id')->get();
        $category = new Category();

        return view('admin.categories.create', compact('categories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image' => 'required',
        ]);

        // dd($request->file('image'));

        $path = $request->file('image')->store('images', 'files');
        // $request->file('image')->move()

        $name = json_encode([
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ], JSON_UNESCAPED_UNICODE);

        $description = json_encode([
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ], JSON_UNESCAPED_UNICODE);

        $category = Category::create([
            'name' => $name,
            'slug' => Str::slug($request->name_en),
            'description' => $description,
            'icon' => $request->icon,
            'parent_id' => $request->parent_id
        ]);

        $category->image()->create([
            'path' => $path,
            'type' => 'cover'
        ]);

        return redirect()
        ->route('admin.categories.index')
        ->with('msg', 'Category created successfully')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::select('id', 'name')->latest('id')->whereNull('parent_id')->get();

        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
        ]);

        // dd($request->file('image'));

        if($request->hasFile('image')) {
            File::delete(public_path($category->image->path));
            $path = $request->file('image')->store('images', 'files');
            $category->image()->update([
                'path' => $path
            ]);
        }


        $name = json_encode([
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ], JSON_UNESCAPED_UNICODE);

        $description = json_encode([
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ], JSON_UNESCAPED_UNICODE);

        $category->update([
            'name' => $name,
            'description' => $description,
            'icon' => $request->icon,
            'parent_id' => $request->parent_id
        ]);

        return redirect()
        ->route('admin.categories.index')
        ->with('msg', 'Category updated  successfully')
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        File::delete(public_path($category->image->path));
        $category->image()->delete();
        $category->delete();

        return redirect()
        ->route('admin.categories.index')
        ->with('msg', 'Category deleted successfully')
        ->with('type', 'danger');
    }
}
