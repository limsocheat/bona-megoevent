@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Product Category</h1>
@stop

@section('content')
<div class="card">
    {!! Form::open(['route' => ['admin.product_category.store'], 'method' => 'POST']) !!}
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'name', 'class' => 'form-control']) !!}
            </div>
           <div class="form-group">
                {!! Form::label('description', 'Descrition') !!}
                {!! Form::text('description', null, ['placeholder' => 'description', 'class' => 'form-control']) !!}
			</div>
			 <div class="form-group">
                {!! Form::label('active', 'Active') !!}
                {!! Form::text('active', null, ['placeholder' => 'description', 'class' => 'form-control']) !!}
            </div>
           
        </div>
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
@stop