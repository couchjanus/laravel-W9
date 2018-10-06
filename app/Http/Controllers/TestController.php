<?php

namespace App\Http\Controllers;

use Debugbar;
use Exception;

use App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index()
    {
        // Debugbar::info($object);
        // Debugbar::error('Error!');
        // Debugbar::warning('Watch out…');
        // Debugbar::addMessage('Another message', 'mylabel');

        // And start/stop timing:

        // Debugbar::startMeasure('render', 'Time for rendering');
        // Debugbar::stopMeasure('render');
        // Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
        // Debugbar::measure(
        //     'My long operation', function () {
        //         // Do something…
        //     }
        // );

        // try {
        //     throw new Exception('foobar');
        // } catch (Exception $e) {
        //     Debugbar::addThrowable($e);
        // }

        // $posts = \App\Category::find(1)->posts;
        $id = 2;
        $category = \App\Category::find($id);
        $posts = $category->posts()->get();
        $posts = $category->posts->where('is_active', 1)->all();

        foreach ($posts as $post) {
            //
            echo($post->id." ");
            echo($post->title."<br>");
            echo($post->slug."<br>");
        }

        $category = \App\Category::find(1);

        // return view('test');
    }

}
