<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $courses = DB::select('SELECT * FROM courses');

        // $courses = DB::table('courses')->orderBy('id', 'DESC')->paginate(2);
        // $courses = DB::table('courses')->orderBy('id', 'DESC')->simplePaginate(10);
        $courses = Course::orderBy('id', 'DESC')->simplePaginate(10);

        // dd($courses);

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = new Course();
        return view('courses.create', compact('course'));
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
        // DB::table('courses')->insert($data);
        Course::create($data);

        return redirect()->route('courses.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // $course = DB::table('courses')->where('slug', $slug)->firstOrFail();
        // $course = DB::table('courses')->where('slug', $slug)->first();

        // if(!$course) {
        //     abort(404);
        // }

        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        // $course = DB::table('courses')->where('slug', $slug)->first();

        // if(!$course) {
        //     abort(404);
        // }

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        $data = $request->validated();

        unset($data['image']);
        // $course = DB::table('courses')->where('slug', $slug)->first();

        if($request->hasFile('image')) {
            // upload file
            if($course->image != 'no-image.png') {
                File::delete(public_path('images/'.$course->image));
            }

            $ex = $request->file('image')->getClientOriginalExtension();
            $newname = rand().'_'.time().'_'.rand().'.'.$ex;
            $request->file('image')->move(public_path('images'), $newname);
            $data['image'] = $newname;
        }

        // dd($data);
        // DB::table('courses')->where('slug', $slug)->update($data);
        $course->update($data);

        // return redirect()->route('courses.index');
        return response()->json([
            'message' => "Successfully updated course",
            // 'course' => DB::table('courses')->where('slug', $slug)->first()
            'course' => $course
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // DB::table('courses')->delete($id);

        if($course->image != 'no-image.png') {
            File::delete(public_path('images/'.$course->image));
        }

        return redirect()->route('courses.index');
    }
}
