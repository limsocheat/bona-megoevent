@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Edit Exhibitor</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($exhibitor,['route' => ['admin.exhibitor.update',$exhibitor->id], 'method' =>'PUT', 'files' => true]) !!}
        <div class="card-body">
            @include('admin.exhibitor.form')
        </div>

        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>

@stop