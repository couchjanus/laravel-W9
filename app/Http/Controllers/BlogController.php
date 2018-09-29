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

        $posts = DB::select('select * from posts');

        // $posts = DB::table('posts')->paginate(7);
        // $posts = DB::table('posts')->paginate(7)->onEachSide(1);
        return view('blog.index2', ['posts' => $posts]);

    }

    public function index0()
    {

        $posts = DB::select('select * from posts');

        return view('blog.index0', ['posts' => $posts]);

    }

    public function index1()
    {
        $posts = DB::select('select * from posts');

        return view('blog.index1', ['posts' => $posts]);

    }

    public function index2()
    {
        $posts = DB::table('posts')->paginate(10);


        return view('blog.index2', ['posts' => $posts]);

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
