@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Category</h1>
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
    {!! Form::open(['route' => ['admin.category.store'], 'method' => 'POST']) !!}
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
                {!! Form::text('active', null, ['placeholder' => 'Active', 'class' => 'form-control']) !!}
            </div>
           
        </div>
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
@stop
