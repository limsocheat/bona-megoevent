@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($user, ['route' => ['admin.profile.update'], 'method' => 'PUT']) !!}
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
            {!! Form::submit('Save', ['class' => 'btn mego-gold-bg']); !!}
        </div>
    {!! Form::close() !!}
</div>
@stop
