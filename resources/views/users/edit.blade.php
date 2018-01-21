@extends('layouts.app')

@push('stylesheet')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-2">
          @include('users.menu')
        </div>

        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="/users/{{$user->id}}/update">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}                        

                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-md-4 control-label">Phone number</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" required autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company" value="{{ $user->company }}" autofocus>

                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="birthdate" class="col-md-4 control-label">Bithdate</label>

                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="form-control" name="birthdate" value="{{ $user->birthdate }}" autofocus>

                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
      $( function() {
        $( "#datepicker" ).datepicker();
      } );
    </script>
@endpush