<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Gate;

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

    // public function index3()
    // {
    //     $posts = DB::table('posts')->simplePaginate(10);
    //     return view('blog.index3', ['posts' => $posts]);
    // }

    public function gate()
    {
        $post = \App\Post::find(1);

        if (Gate::allows('update-post', auth()->user())) {
            echo '<h2>Update Post Allowed</h2>';
        } else {
            echo '<h2>Update Post Not Allowed</h2>';
        }
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get current logged in user
        $user = Auth::user();

        if ($user->can('create', Post::class)) {
            echo 'Current logged in user is allowed to create new posts.';
        } else {
            echo 'Not Authorized';
        }
        exit;
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            DB::insert('insert into posts (title, content, category_id)
            values (?, ?, ?)', [$request['title'], $request['content'], 1]);

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get current logged in user
        $user = Auth::user();

        // load post
        $post = Post::find(1);

        if ($user->can('view', $post)) {
            echo "Current logged in user is allowed to update the Post: {$post->id}";
        } else {
            echo 'Not Authorized.';
        }

        $post = DB::select("select * from posts where id = :id", ['id' => $id]);

        return view('blog.show3', ['post' => $post]);

    }


    // PostsController, метод showBySlug:
    public function showBySlug($slug)
    {
        /**
            * Вначале мы проверяем, не является ли слаг числом.
            * Часто слаги внедряют в программу уже после того,
            * как был другой механизм построения пути.
            * Например, через числовые индексы.
            * Тогда может получится ситуация, что пользователь,
            * зайдя на сайт по старой ссылке, увидит 404 ошибку,
            * что такой страницы не существует.
        */
        if (is_numeric($slug)) {
            // Get post for slug.
            $post = \App\Post::findOrFail($slug);
            return Redirect::to(route('blog.show', $post->slug), 301);
            // 301 редирект со старой страницы, на новую.
        }
        // Get post for slug.
        $post = \App\Post::whereSlug($slug)->firstOrFail();
        return view(
            'blog.show',
            [
                'post' => $post,
                'hescomment' => true
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get current logged in user
        $user = Auth::user();

        // load post
        $post = Post::find(1);

        if ($user->can('update', $post)) {
            echo "Current logged in user is allowed to update the Post: {$post->id}";
        } else {
            echo 'Not Authorized.';
        }
        return view('posts.create');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($request->user()->cannot('update-post', $post)) {
            abort(403);
        }

        // if ($request->user()->can('update-post', $post)) {
        //     // Обновление статьи...
        // }

        // $post = Post::findOrFail($id);
        // if ($request->user()->cannot('update-post', $post)) {
        //     abort(403);
        // }

        // if ($request->user()->can('update-post', $post)) {
        //     // Обновление статьи...
        // }


        // Обновление статьи...

        $sql = "UPDATE posts SET title= ? content= ? WHERE id= ?";
        DB::update($sql, array($request['title'], $request['content'], 'id' => $id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get current logged in user
        $user = Auth::user();

        // load post
        $post = Post::find(1);

        if ($user->can('delete', $post)) {
            echo "Current logged in user is allowed to delete the Post: {$post->id}";
        } else {
            echo 'Not Authorized.';
        }
        DB::table('posts')->where('id', '=', $id)->delete();
    }

    public function destroyPost($id)
    {
        $user = Auth::user();
        $post = \App\Post::findOrFail($id);
        if (Gate::forUser($user)->denies('destroy-post', $post)) {
            // Пользователь не может удалять статью...
            dd('Пользователь '.$user->name.' не может удалять статью...');
        }
    }

}
