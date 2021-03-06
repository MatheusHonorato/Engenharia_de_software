@extends('admin.layout')

@section('content')

<style type="text/css">
    @media (max-width: 768px){

    .panel {

        margin-top: 35% !important;

    }

}

    @media (min-width: 800px){

    .panel {

        margin-top: 20% !important;

    }

}

}
</style>

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">Register A admin</div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}">

                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <label for="name" class="col-md-4 control-label">Name</label>



                            <div class="col-md-6">

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>



                                @if ($errors->has('name'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('name') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>



                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>



                                @if ($errors->has('email'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('email') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <label for="password" class="col-md-4 control-label">Password</label>



                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control" name="password" required>



                                @if ($errors->has('password'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('password') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>



                            <div class="col-md-6">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            </div>

                        </div>



                        <div class="form-group">

                            <div class="col-md-6 col-md-offset-4">

                                <button type="submit" class="btn btn-default">

                                    Cadastrar

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

@endsection