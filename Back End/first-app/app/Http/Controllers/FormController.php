<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form1Request;
use App\Rules\WordsCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    function form1() {
        return view('forms.form1');
    }

    function form1_data(Form1Request $request) {
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('name', '_token'));


        // Validation
        // 1. Request Validation
        // 2. Validator Class
        // 3. Form Request

        // $request->validate([
        //     'name' => 'required|min:4|max:30',
        //     'email' => 'required|email|ends_with:@gmail.com',
        //     'bio' => ['nullable', new WordsCount(5)],
        // ], [
        //     'name.required' => 'هذا الحقل مطلوب'
        // ]);

        // $valid_data = Validator::make($request->all(), [
        //     'name' => 'required|min:4|max:30',
        //     'email' => 'required|email|ends_with:@gmail.com',
        //     'bio' => ['nullable', new WordsCount(5)],
        // ]);

        // if($valid_data->fails()) {
        //     return redirect()->back()->withErrors($valid_data)->withInput();
        //     // return response()->json([
        //     //     'status' => false,
        //     //     'message' => $valid_data->errors(),
        //     //     'data' => []
        //     // ], 301);
        // }

        dd($request->validated());













        // $data = $request->except('image');

        // if($request->hasFile('image')) {
        //     $data['image'] = 'ddd';
        // }

        // Post::create($data);


    }

    function form2() {
        return view('forms.form2');
    }

    function form2_data(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'date',
            'graduation' => 'date|after:dob',
        ]);


        dd($request->all());
    }

    function form3() {
        return view('forms.form3');
    }

    function form3_data(Request $request) {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
        ]);

        // if(!file_exists('image')) {
        //     mkdir('images');
        // }

        // dd($request->all());
        // $imgname = $request->file('image')->getClientOriginalName();
        // $imgname = str_replace(' ', '-', strtolower($imgname));
        // $imgname = str_replace(' ', '-', strtolower($request->name)) . '-' . date('d-m-Y') . '-' . $imgname;
        // $request->file('image')->move(public_path('images'), $imgname);

        $path = $request->file('image')->storePublicly('images', 'new');

        return view('forms.form3_image', compact('path'));
    }
}
