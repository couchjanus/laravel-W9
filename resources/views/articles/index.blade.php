@extends('layouts.blog')

<main role="main" class="container">
  <div class="row">
    @section('content')
    <!-- Blog Entries Column -->

          <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
              <h2 class="mt-4 mb-3">Articles <small>({{ $articles->count() }})</small>
              </h2>
            </h3>

                <div class="col-md-8">
                  <h5 class="card-header">Search</h5>
                  <div class="card-body">
                    <form action="{{ url('search') }}" method="get">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for..." name="q" value="{{ request('q') }}">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                      </span>
                    </div>
                    </form>
                  </div>
                </div>
                <div class="panel-body">
                  @forelse ($articles as $article)
                    <article>
                      <h2>{{ $article->title }}</h2>
                      <p>{{ $article->content }}</body>

                    </article>
                  @empty
                    <p>No articles found</p>
                  @endforelse
                </div>


          </div>
          <!-- /.blog-main -->

    @endsection

    @section('sidebar')
          <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
              <h4 class="font-italic">About</h4>
              <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>

            <div class="p-3">
              <h4 class="font-italic">Archives</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">March 2019</a></li>
                <li><a href="#">February 2019</a></li>
                <li><a href="#">January 2019</a></li>
                <li><a href="#">December 2019</a></li>
                <li><a href="#">November 2019</a></li>
                <li><a href="#">October 2019</a></li>
                <li><a href="#">September 2019</a></li>
                <li><a href="#">August 2019</a></li>
                <li><a href="#">July 2019</a></li>
                <li><a href="#">June 2019</a></li>
                <li><a href="#">May 2019</a></li>
                <li><a href="#">April 2019</a></li>
              </ol>
            </div>

            <div class="p-3">
              <h4 class="font-italic">Elsewhere</h4>
              <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
              </ol>
            </div>
          </aside><!-- /.blog-sidebar -->
        @endsection
        </div><!-- /.row -->

      </main>
      <!-- /.container -->
<!-- /.row -->
