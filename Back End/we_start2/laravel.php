<?php 

class BlogController {

    function contact() {
        return 'Contact Page here';
    }

}

class Route {
    public static function get($uri, $action) {

        // $path = explode('@', $action);
        $blog = new $action[0];

        // return call_user_func($action[1], $blog);
        return call_user_func(array($blog, $action[1]));
    }
}

echo Route::get('/contact', [BlogController::class, 'contact']);
// echo Route::get('/contact', 'Blog@contact');