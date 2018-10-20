<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Gate;

use App\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->paginate(7)->onEachSide(1);
        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {
      if (is_numeric($slug)) {
        // Get post for slug.
        $post = Post::findOrFail($slug);
        return redirect(route('blog.show', $post->slug), 301);
        // 301 редирект со старой страницы, на новую.
      }

      $post = Post::whereSlug($slug)->firstOrFail();
      // $this->breadcrumbs
      //      ->addCrumb('Blog', 'blog')
      //      ->addCrumb($post->title, "");

      return view(
        'blog.show',
        [
         'post' => $post,
         // 'breadcrumbs' => $this->breadcrumbs,
         'hescomment' => true
        ]
      );
    }
}
