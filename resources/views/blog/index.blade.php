@extends('layouts.blog')

<main role="main" class="container">
  <div class="row">
    @section('content')
    <!-- Blog Entries Column -->

          <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
              From the Firehose
            </h3>

            <div class="blog-post">
              <h2 class="blog-post-title">Sample blog post</h2>
              <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

              <p>This blog post shows a few different types of content thats supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
              <hr>
              <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
              <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              </blockquote>
              <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <h2>Heading</h2>
              <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <h3>Sub-heading</h3>
              <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
              <pre><code>Example code block</code></pre>
              <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
              <h3>Sub-heading</h3>
              <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <ul>
                <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                <li>Donec id elit non mi porta gravida at eget metus.</li>
                <li>Nulla vitae elit libero, a pharetra augue.</li>
              </ul>
              <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
              <ol>
                <li>Vestibulum id ligula porta felis euismod semper.</li>
                <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
              </ol>
              <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
            </div><!-- /.blog-post -->

            <div class="blog-post">
              <h2 class="blog-post-title">Another blog post</h2>
              <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

              <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
              <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              </blockquote>
              <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            </div><!-- /.blog-post -->

            @foreach ($posts as $post)
                <div class="blog-post">
                <h2 class="blog-post-title">{{$post->title}}</h2>
                <p class="blog-post-meta">{{$post->created_at}}</p>
                <a class="button" href="/blog/{{$post->id}}">Read More</a>
                </div>
                <!-- /.blog-post -->
            @endforeach



            <nav class="blog-pagination">
              <a class="btn btn-outline-primary" href="#">Older</a>
              <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

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
