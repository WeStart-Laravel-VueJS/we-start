<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $courses = DB::select('SELECT * FROM courses');

        // $courses = DB::table('courses')->orderBy('id', 'DESC')->paginate(2);
        $courses = DB::table('courses')->orderBy('id', 'DESC')->simplePaginate(10);

        // dd($courses);

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $data = $request->validated();

        unset($data['image']);
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = now();

        if($request->hasFile('image')) {
            // upload file
            $ex = $request->file('image')->getClientOriginalExtension();
            $newname = rand().'_'.time().'_'.rand().'.'.$ex;
            $request->file('image')->move(public_path('images'), $newname);
            $data['image'] = $newname;
        }

        // dd($data);
        DB::table('courses')->insert($data);

        return redirect()->route('courses.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        DB::table('courses')->delete($id);

        return redirect()->route('courses.index');
    }
}
