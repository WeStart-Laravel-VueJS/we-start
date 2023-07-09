<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function home() {
        $posts = [
            [
                'id' => 1,
                'title' => 'title 1',
                'content' => 'lorem 1'
            ],
            [
                'id' => 2,
                'title' => 'title 2',
                'content' => 'lorem 2'
            ],
            [
                'id' => 3,
                'title' => 'title 3',
                'content' => 'lorem 3'
            ],
            [
                'id' => 4,
                'title' => 'title 4',
                'content' => 'lorem 4'
            ],
            [
                'id' => 5,
                'title' => 'title 5',
                'content' => 'lorem 5'
            ]
        ];


        // return view('home')->with('posts', $posts);
        // return view('home', [
        //     'posts' => $posts
        // ]);
        return view('home', compact('posts'));
        // return view('home');
    }

    function about() {
        return 'about page';
    }

    function contact() {
        return 'contact page';
    }

    function contactData() {
        return 'contactData page';
    }

}
