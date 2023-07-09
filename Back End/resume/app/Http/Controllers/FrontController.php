<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index() {
        return view('index');
    }

    function contact() {
        return view('contact');
    }

    function contact_data() {
        return 'Done';
    }

    function projects() {
        return view('projects');
    }

    function resume() {
        $page_title = 'My Resume';
        return view('resume', compact('page_title'));
    }


}
