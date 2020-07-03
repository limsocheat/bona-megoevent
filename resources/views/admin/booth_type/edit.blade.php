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
                 {!! Form::label('vip_speech', 'Vip Speech :') !!}
                 {{ Form::select('vip_speech', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
             </div>

             <div class="form-group">
                 {!! Form::label('vip_moderator', 'Vip Moderator:') !!}
                 {{ Form::select('vip_moderator', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
             </div>

             <div class="form-group">
                {!! Form::label('ads_event', 'Banner Ads on Event Front Page') !!}
                {!! Form::number('ads_event', null, ['placeholder' => 'Banner Ads on Event Front Page', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>
            
             <div class="form-group">
                {!! Form::label('banner_ads_homepage', 'Banner Ads on Homepage') !!}
                {!! Form::number('banner_ads_homepage', null, ['placeholder' => 'Banner Ads on Homepage', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('number_products', 'Number of Products') !!}
                {!! Form::text('number_products', null, ['placeholder' => 'Number of Products', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>

            <div class="form-group">
                 {!! Form::label('auction', 'auction :') !!}
                 {{ Form::select('auction', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {!! Form::label('leads', 'Leads') !!}
                {!! Form::text('leads', null, ['placeholder' => 'Leads', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>

            <div class="form-group">
                 {!! Form::label('live_chat', 'live Chat:') !!}
                 {{ Form::select('live_chat', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
            </div>

            <div class="form-group">
                 {!! Form::label('surveys', 'Surveys :') !!}
                 {{ Form::select('surveys', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
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
