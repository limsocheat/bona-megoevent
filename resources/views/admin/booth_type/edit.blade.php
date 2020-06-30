@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Booth Type</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($booth_type,['route' => ['admin.booth_type.update',$booth_type->id], 'method' => 'PUT']) !!}
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'name', 'class' => 'form-control']) !!}
			</div>
			
         	<div class="form-group">
                {!! Form::label('pricing', 'Pricing') !!}
                {!! Form::text('pricing', null, ['placeholder' => 'Pricing', 'class' => 'form-control','id' => 'digitsOnly']) !!}
			</div>

			<div class="form-group">
                {!! Form::label('total', 'Total Per Event') !!}
                {!! Form::text('total', null, ['placeholder' => 'Total Per Event', 'class' => 'form-control','id' => 'digitsOnly']) !!}
			</div>
			
			 <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::text('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
            </div>
           
        </div>
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery('#digitsOnly').keypress(function(event){
	if(event.which !=8 && isNaN(String.fromCharCode(event.which))){
		event.preventDefault();
	}
		console.log(event.which);

    });
</script>
@stop
