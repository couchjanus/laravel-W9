@extends('layouts.app')

@section('head')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('jumbotron')
   <div class="jumbotron">
       <div class="container">
           <h1>Contact Us</h1>
           <h2>Your message will be delivered to our clandestine team</h2>
       </div>
   </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="badge badge-pill badge-success">Success</span> {!! $message !!}.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          @if ($message = Session::get('errors'))
          @foreach ($errors->all() as $error)
            <span class="badge badge-pill badge-danger">Error</span> {!! $error !!}. <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
          @endforeach
          @endif

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Contact Us</div>

                    <div class="card-body">
                      {!! Form::open(array('route' => 'contact.store', 'class' => 'form')) !!}
                         <div class="row form-group">
                             {!! Form::label('name', 'Your Name') !!}
                             {!! Form::text('name', null, ['class' => 'form-control']) !!}
                         </div>
                         <div class="row form-group">
                             {!! Form::label('email', 'E-mail Address') !!}
                             {!! Form::text('email', null, ['class' => "form-control"]) !!}
                             @if ($errors->has('email'))
                               <span class="invalid-feedback">
                                 <strong>{{ $errors->first('email') }}</strong>
                               </span>
                             @endif
                         </div>
                         <div class="row form-group">
                             {!! Form::label('message', 'Message') !!}
                             {!! Form::textarea('message', null, ['class' => "form-control"]) !!}
                             @if ($errors->has('message'))
                               <span class="invalid-feedback">
                                 <strong>{{ $errors->first('message') }}</strong>
                               </span>
                             @endif
                         </div>
                         <div class="form-group row">
                             <div class="col-12">
                                 <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
                                 @if ($errors->has('g-recaptcha-response'))
                                     <span class="invalid-feedback" style="display: block;">
                                     <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                 </span>
                                 @endif
                             </div>
                         </div>

                         {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
