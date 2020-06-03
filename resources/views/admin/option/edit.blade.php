@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Option</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($option,['route' => ['admin.option.update',$option->id], 'method' => 'PUT']) !!}
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'name', 'class' => 'form-control']) !!}
			</div>
			 <div class="form-group">
                {!! Form::label('type', 'Type :') !!}
                 {{ Form::select('type', ['event_team' => 'event_team', 'event_attendance' => 'event_attendance', 'event_frequency' => 'event_frequency','event_location'=>'event_location'], null, ['id' => 'type','class' => 'form-control']) }}
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
