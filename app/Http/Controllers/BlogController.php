<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

    public function index3()
    {
        $posts = DB::table('posts')->simplePaginate(10);
        return view('blog.index3', ['posts' => $posts]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        DB::table('posts')->where('id', '=', $id)->delete();
    }
}
