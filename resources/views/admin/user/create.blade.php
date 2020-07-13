@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create User</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Sorry!</strong> Please check your input again.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
   
<div class="card">
    {!! Form::open(['route' => ['admin.user.store'], 'method' => 'POST']) !!}
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'User Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'user name', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-Mail Address') !!}
                {!! Form::email('email', null, ['placeholder' => 'enter email address', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role', 'Role') !!}
                {!! Form::select('role', $roles, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
@stop
