<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
        // if (Gate::allows('is-admin')) {
        //     return view('admin.index');
        // }
        // return view('profiles.home');
    }

    /**
     * Show the application private resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function private()
    {
        if (Gate::allows('admin-only', auth()->user())) {
            return view('home.private');
        }
        return 'You are not admin!!!!';
        // return view('home.private');
    }
}
