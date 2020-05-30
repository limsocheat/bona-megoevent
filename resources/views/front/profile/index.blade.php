@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {!! Form::model($user, ['route' => ['profile.update'], 'method' => 'PUT']) !!}
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
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
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
        </div>
        <div class="col-md-8" style="margin-top: 20px">
            <div class="card">
                {!! Form::model($user, ['route' => ['profile.update'], 'method' => 'PUT']) !!}
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
        </div>
    </div>
    
</div>
@endsection