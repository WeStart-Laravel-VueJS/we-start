<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends BaseController
{
    function store(Request $request) {
        $this->uploadImage($request->file('image'), 'posts');
    }
}
