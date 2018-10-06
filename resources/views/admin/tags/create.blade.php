@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> {!! $message !!}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

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
        <div class="panel-heading"><h2>Add New Tag</h2></div>
          <div class="panel-body">

            <a href="{{ route('tags.index') }}" class="btn btn-success btn-sm" title="All tags">
                <span data-feather="arrow-left"></span>  Go Back
            </a>
            <br/>
            <div class="table-responsive">
              <form action="{{ route('tags.store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input name="name" class="form-control" type="text" placeholder="Enter name" required id="title">
                            @if($errors->has('name'))
                                <p class="help-block" style="color:crimson;">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif

                        </div>
                    </div>
                    <div class="card-block">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input name="description" class="form-control" type="text" placeholder="Enter description">
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
