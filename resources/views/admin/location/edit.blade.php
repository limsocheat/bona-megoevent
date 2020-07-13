@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Edit Location</h1>
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
    {!! Form::model($location,['route' => ['admin.location.update',$location->id], 'method' => 'PUT']) !!}
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['placeholder' => 'name', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Descrition') !!}
            {!! Form::text('description', null, ['placeholder' => 'description', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('active', 'Active') !!}
            {!! Form::select('active', [true => 'Active', false => 'Inactive'], null, [ 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="card-footer ">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
    </div>
    {!! Form::close() !!}
</div>
@stop