<div class="post-preview">
        <a href="/blog/{{$post->id}}">
          <h2 class="post-title">{{$post->title}} </h2>
          </a>
          <h3 class="post-subtitle"> Problems look mighty small from 150 miles up </h3>
        <p class="post-meta">Posted by  <a href="#">Janus </a>  {{$post->created_at}}</p>

        <a href="{!! route('blog.show', $post->slug) !!}"
                class="btn btn-info">Read More</a>
</div>
<hr>
