@extends('layouts.app')

            <div class="content">
              @section('content')
              <div class="container" id="app">
                 <div class="blog-header">
                   <h1 class="blog-title"><a href="{{url('blog')}}">Welcome to my Site</a></h1>
                   <p class="lead blog-description">Resent Posts</p>
                 </div>
               <div id="app">
                 <search></search>
               </div>

              @endsection

            </div>
