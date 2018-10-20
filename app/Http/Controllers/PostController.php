<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;
// use App\Repositories\PostRepository;

use Breadcrumbs;

class PostController
{
    protected $post;
    // protected $breadcrumbs;

    // public function __construct(PostRepository $post)

    public function __construct(PostRepositoryInterface $post)
    {
        $this->post = $post;
        // $this->breadcrumbs = Breadcrumbs::addCrumb('Home', '/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->paginate(10);

        $response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ],
            'data' => $posts
        ];

        return response()->json($response);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->post->findBy('slug', $slug);
        // $this->breadcrumbs
        //     ->addCrumb('Blog', 'blog')
        //     ->addCrumb($post->title, "");

        return view(
            'blog.show',
            [
                'post' => $post,
                // 'breadcrumbs' => $this->breadcrumbs,
                'hescomment' => true,
            ]
        );
    }
}
