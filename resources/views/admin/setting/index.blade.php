@extends('adminlte::page')

@section('title', 'Setting')

@section('content_header')
    <h1>Setting</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($setting, ['route' => ['admin.setting.update'], 'method' => 'PUT']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-md-3 form-group">
                    {!! Form::label("event[grid_block_value]", 'Grid Block Value') !!}
                    {!! Form::number('event[grid_block_value]', null, ['placeholder' => 'Grid Block Value', 'min' => 0, 'class' => 'form-control', 'required' => true]) !!}
                </div>
                <div class="col-xs-12 col-md-3 form-group">
                    {!! Form::label('event[tax_percentage]', 'Tax Percentage') !!}
                    {!! Form::number('event[tax_percentage]', null, ['placeholder' => 'Tax Percentage', 'min' => 0, 'class' => 'form-control', 'required' => true]) !!}
                </div>
            </div>
        </div>
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
@stop
