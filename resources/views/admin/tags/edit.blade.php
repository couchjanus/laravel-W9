@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
            @if (Session::get('message') != Null)
            <div class="row">
                <div class="col-md-9">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('message') }}
                    </div>
                </div>
            </div>
            @endif

      <div class="panel panel-default">
        <div class="panel-heading"><h2>Edit Tag</h2></div>
          <div class="panel-body">

            <a href="{{ route('tags.index') }}" class="btn btn-success btn-sm" title="All tags">
                <span data-feather="arrow-left"></span>  Go Back
            </a>
            <br/>
            <div class="table-responsive">
                    <form action="{{ route('tags.update',['id' => $tag->id]) }}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input name="name" class="form-control" type="text" value="{{ $tag->name }}" required id="title">
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input name="description" class="form-control" type="text" value="{{ $tag->description }}">
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                      <button type="submit" class="btn btn-primary btn-sm pull-right"><span data-feather="save"></span> Save</button>
                    </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
