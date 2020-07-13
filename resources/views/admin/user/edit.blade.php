@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit User</h1>
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
    {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'PUT']) !!}
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
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <small id="passwordHelp" class="form-text text-muted">Leave empty to keep unchanged.</small>
            </div>
        </div>
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
@stop
