@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
            @if (count($errors) > 0)
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                    <span class="badge badge-pill badge-danger">Error</span> {!! $error !!}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    @endforeach
                </div>
              </div>
            </div>
            @endif

        <div class="panel panel-default">
            <div class="panel-heading">Edit article</div>
                <div class="panel-body">
                    <a href="{{ route('posts.index') }}" class="btn btn-success btn-sm" title="All Posts">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back
                    </a>
                    <div class="table-responsive">
                        <form action="{{ route('posts.update',['id' => $post->id]) }}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card">
                                <div class="form-group">
                                            <label for="title">Title</label>
                                            <input name="title" class="form-control" type="text" value="{{ $post->title }}" placeholder="title of article">
                                </div>
                                <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea name="content" class="form-control" rows="10">{{ $post->content }}</textarea>
                                </div>
                                <div class="form-group">

                                            <label for="category_id">Select Category</label>

                                            <select name="category_id" class="form-control selectpicker">
                                            @foreach ($categories as $key => $value)
                                                <option value="{{ $key }}"
                                                @if ($key == old('category_id', $post->category_id))
                                                    selected="selected"
                                                @endif
                                                >{{ $value }}</option>
                                            @endforeach
                                            </select>

                                </div>
                                <div class="form-group">
                                            <label class="col-md-3 col-form-label">Is Active</label>
                                            <div class="col-md-9">
                                                  <label class="radio-inline" for="inline-radio1">
                                                    <input type="radio" id="inline-radio1" name="is_active" value="1" @if (old('is_active', $post->is_active)) checked="checked" @endif> Yes
                                                  </label>
                                                  <label class="radio-inline" for="inline-radio2">
                                                    <input type="radio" id="inline-radio2" name="is_active" value="0"> No
                                                  </label>
                                            </div>
                                </div>
                                <div class="form-group">
                                            <label for="tags">Select Tags</label>
                                            <select name="tags[]" id="tags" class="form-control state-tags-multiple" multiple="multiple">
                                            @foreach($tags as $key => $value)
                                              <option value="{{ $key }}"
                                               {{ (collect(old('tags'))->contains($key)) ? 'selected':'' }}  />
                                               {{ $value }}
                                              </option>
                                            @endforeach
                                            </select>
                                </div>
                                <div class="card-footer text-muted">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script src="/js/jquery.min.js"></script>
<script src="/js/select2.min.js"></script>
<script>
        $('').select2({
            placeholder: 'Choose A Tag',
            tags: true
        });
        $('#tags').select2().val({!! json_encode($post->tags()->allRelatedIds()->toArray()) !!}).trigger('change');
</script>
@endsection
