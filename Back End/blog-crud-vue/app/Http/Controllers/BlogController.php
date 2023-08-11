<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            'status' => true,
            'message' => 'Done',
            'data' => Blog::all()
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'body' => 'required',
        ]);

        $path = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $path);

        $blog = Blog::create([
            'title' => $request->title,
            'image' => $path,
            'body' => $request->body,
        ]);

        return [
            'status' => true,
            'message' => 'Done',
            'data' => $blog
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);
        if($blog) {
            return [
                'status' => true,
                'message' => 'Done',
                'data' => $blog
            ];
        }

        return [
            'status' => true,
            'message' => 'Done',
            'data' => []
        ];

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'image' => 'required',
        //     'body' => 'required',
        // ]);

        $blog = Blog::find($id);

        if(!$blog) {
            return [
                'status' => true,
                'message' => 'Done',
                'data' => []
            ];
        }

        $data = $request->except('_token', 'image', '_method', 'prev_img');
        if($request->hasFile('image')) {
            File::delete(public_path('images/'.$blog->image));
            $path = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $path);
            $data['image'] = $path;
        }


        $blog->update($data);

        return [
            'status' => true,
            'message' => 'Done',
            'data' => $blog
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if(!$blog) {
            return [
                'status' => true,
                'message' => 'Done',
                'data' => []
            ];
        }

        File::delete(public_path('images/'.$blog->image));
        $blog->delete();

        return [
            'status' => true,
            'message' => 'Done',
            'data' => []
        ];
    }
}
