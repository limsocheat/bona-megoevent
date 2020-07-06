@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Venue</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($venue,['route' => ['admin.venue.update',$venue->id], 'method' => 'PUT']) !!}
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'name', 'class' => 'form-control']) !!}
			</div>
				
			<div class="form-group">
				{!! Form::label('size', 'Size') !!}
				{!! Form::text('size', null, ['placeholder' => 'size', 'class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('width', 'Width') !!}
				{!! Form::number('width', null, ['placeholder' => 'width', 'class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('length', 'Length') !!}
				{!! Form::number('length', null, ['placeholder' => 'length', 'class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('description', 'Description') !!}
				{!! Form::text('description', null, ['placeholder' => 'description', 'class' => 'form-control']) !!}
            </div>
           
        </div>
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
@stop
