<?php

namespace App\Http\Controllers;

use App\Helpers\General;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    function index() {
        $name = 'zina2.jpeg';
        return img_path($name);
        // return General::img_path($name);
    }

    function countries() {
        $countries = Country::with('flag')->get();

        // $country->flag // get data
        // $country->flag() // call database function
        // dd($countries);

        return view('countries', compact('countries'));
    }

    function posts() {
        $posts = Post::paginate(6);

        return view('posts', compact('posts'));
    }

    // function post(Post $post) {
    function post($post) {
        // $post->load('comments');

        // dd(now()->subWeek());

        // $post = Post::withCount(['comments' => function($query) {
        //     $query->whereDate('created_at', '>' , now()->subWeek());
        // }])->find($post);

        $post = Post::with('comments')->withCount('comments')->find($post);

        // dd($post);

        return view('post', compact('post'));
    }

    function post_comment(Request $request, $post) {
        // $post = Post::find($post);

        // $post->comments()->create([
        //     'content' => $request->content,
        //     'user_id' => rand(1, 10)
        // ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => rand(1, 10),
            'post_id' => $post
        ]);

        return redirect()->back();
    }

    function add_post() {
        $tags = Tag::all();
        return view('add_post', compact('tags'));
    }

    function add_post_data(Request $request) {
        // dd($request->all());
        $path = $request->file('image')->store('images', 'mn');

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path
        ]);

        $post->tags()->attach($request->tags);
        // $post->tags()->detach();
        // $post->tags()->sync();
        // $post->tags()->toggle();

        // upload images
        // $product = Product::create([
        //     'name' => 'eeee',
        //     'price' => 100
        // ]);
        $images = explode(',', $request->images);
        foreach($images as $img) {
            $post->images()->create([
                'path' => $img
            ]);
        }


        return redirect('/posts');
    }

    function upload_image(Request $request) {
        $path = $request->file('file')->store('images', 'mn');

        return $path;
    }
}
