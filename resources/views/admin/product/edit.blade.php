@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Create Product</h1>
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
    {!! Form::model($product,['route' => ['admin.product.update',$product->id], 'method' =>
    'PUT','files'=>true]) !!}
    
    <div class="card-body">
         @include('admin.product.form')
    </div>

    <div class="card-footer ">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
    </div>
    {!! Form::close() !!}
</div>

@stop