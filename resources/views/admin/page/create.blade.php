@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    <h1>Create Page</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => ['admin.page.store'], 'method' => 'POST']) !!}
        
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['placeholder' => 'slug', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['placeholder' => 'title', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['placeholder' => 'description', 'class' => 'form-control', 'id' => 'summernote']) !!}
                </div>
            </div>
            
            <div class="card-footer ">
                {!! Form::submit('Save', ['class' => 'btn mego-gold-bg']); !!}
            </div>
        {!! Form::close() !!}
        
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200
        });
    });
  </script>
@stop
