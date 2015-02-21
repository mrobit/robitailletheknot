@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                {{ Form::open(['class' => 'login-form', 'method' => 'POST', 'route' => 'login_path']) }}
                    <h2>Log In</h2>

                    <div class="form-group">
                        {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
                        {{ Form::email('email', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Log In', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop